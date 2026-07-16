<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Create payment for a booking.
     */
    public function create(Booking $booking)
    {
        // Ensure user owns this booking
        if (Auth::id() !== $booking->student_id) {
            abort(403);
        }

        $booking->load('tutor.privateTutor');

        return view('payments.create', compact('booking'));
    }

    /**
     * Process manual payment confirmation.
     */
    public function store(Request $request, Booking $booking)
    {
        if (Auth::id() !== $booking->student_id) {
            abort(403);
        }

        $validated = $request->validate([
            'payment_method' => 'required|in:manual,midtrans,duitku',
            'payment_proof' => 'nullable|file|image|max:2048',
        ]);

        $payment = Payment::create([
            'booking_id' => $booking->id,
            'payment_method' => $validated['payment_method'],
            'amount' => $booking->price,
            'status' => 'pending',
        ]);

        if ($request->hasFile('payment_proof')) {
            $proofPath = $request->file('payment_proof')->store('payment_proofs', 'public');
            $payment->update(['payment_details' => ['proof_path' => $proofPath]]);
        }

        $booking->update(['payment_status' => 'pending']);

        return redirect()->route('bookings.show', $booking)
            ->with('success', 'Pembayaran sedang diproses. Silakan menunggu konfirmasi.');
    }

    /**
     * Handle payment callback (webhook).
     */
    public function callback(Request $request)
    {
        // This will be implemented for Midtrans/Duitku webhook
        $validated = $request->validate([
            'order_id' => 'required',
            'status' => 'required',
        ]);

        // Find payment by external_id
        $payment = Payment::where('external_id', $validated['order_id'])->first();

        if ($payment && $validated['status'] === 'paid') {
            $payment->markAsPaid();
            $payment->booking->update(['payment_status' => 'paid']);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Show payment instructions.
     */
    public function instructions(Booking $booking)
    {
        if (Auth::id() !== $booking->student_id) {
            abort(403);
        }

        $booking->load('tutor.privateTutor');

        return view('payments.instructions', compact('booking'));
    }
}