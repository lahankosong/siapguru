<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Show the booking form for a tutor.
     */
    public function create(User $tutor)
    {
        if ($tutor->role !== 'tutor') {
            abort(404);
        }

        $tutor->load('privateTutor');

        return view('bookings.create', compact('tutor'));
    }

    /**
     * Store a new booking.
     */
    public function store(Request $request, User $tutor)
    {
        if ($tutor->role !== 'tutor') {
            abort(404);
        }

        $validated = $request->validate([
            'subject' => 'required|string|max:100',
            'session_date' => 'required|date|after:now',
            'duration' => 'required|in:60,90,120',
            'notes' => 'nullable|string',
        ]);

        $price = $tutor->privateTutor->hourly_rate * ($validated['duration'] / 60);

        $booking = Booking::create([
            'student_id' => Auth::id(),
            'tutor_id' => $tutor->id,
            'subject' => $validated['subject'],
            'session_date' => $validated['session_date'],
            'duration' => $validated['duration'],
            'price' => $price,
            'status' => 'pending',
            'payment_status' => 'pending',
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()->route('bookings.show', $booking)
            ->with('success', 'Permintaan booking telah dikirim. Silakan menunggu konfirmasi dari guru.');
    }

    /**
     * Display a specific booking.
     */
    public function show(Booking $booking)
    {
        $this->authorizeBooking($booking);
        
        $booking->load(['student', 'tutor.privateTutor']);
        
        return view('bookings.show', compact('booking'));
    }

    /**
     * List bookings for the authenticated user.
     */
    public function index()
    {
        $bookings = Booking::where('student_id', Auth::id())
            ->orWhere('tutor_id', Auth::id())
            ->with(['student', 'tutor'])
            ->latest()
            ->paginate(10);

        return view('bookings.index', compact('bookings'));
    }

    /**
     * Confirm a booking (tutor only).
     */
    public function confirm(Booking $booking)
    {
        $this->authorizeBooking($booking);
        
        if (Auth::id() !== $booking->tutor_id) {
            abort(403);
        }

        $booking->update(['status' => 'confirmed']);

        return back()->with('success', 'Booking telah dikonfirmasi.');
    }

    /**
     * Cancel a booking.
     */
    public function cancel(Booking $booking)
    {
        $this->authorizeBooking($booking);

        $booking->update(['status' => 'cancelled']);

        return back()->with('success', 'Booking telah dibatalkan.');
    }

    /**
     * Complete a booking (tutor only).
     */
    public function complete(Booking $booking)
    {
        $this->authorizeBooking($booking);
        
        if (Auth::id() !== $booking->tutor_id) {
            abort(403);
        }

        $booking->update(['status' => 'completed']);

        return back()->with('success', 'Booking telah selesai.');
    }

    /**
     * Authorize that the user can view this booking.
     */
    private function authorizeBooking(Booking $booking): void
    {
        if (Auth::id() !== $booking->student_id && Auth::id() !== $booking->tutor_id) {
            abort(403);
        }
    }
}