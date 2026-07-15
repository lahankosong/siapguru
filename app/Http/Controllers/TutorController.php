<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PrivateTutor;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Display a listing of tutors with filters (Discovery).
     */
    public function index(Request $request)
    {
        $query = User::where('role', 'tutor')
            ->where('is_active', true)
            ->where('is_suspended', false);

        // Filter by Subject
        if ($request->filled('subject')) {
            $query->where('subjects', 'like', '%' . $request->subject . '%');
        }

        // Filter by City
        if ($request->filled('city')) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }

        // Filter by Rate (via PrivateTutor relation)
        if ($request->filled('min_price') || $request->filled('max_price')) {
            $query->whereHas('privateTutor', function ($q) use ($request) {
                if ($request->filled('min_price')) {
                    $q->where('hourly_rate', '>=', $request->min_price);
                }
                if ($request->filled('max_price')) {
                    $q->where('hourly_rate', '<=', $request->max_price);
                }
            });
        }

        // Search by Name or Bio
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('bio', 'like', '%' . $search . '%');
            });
        }

        $tutors = $query->with('privateTutor')->paginate(12)->withQueryString();

        return view('tutors.index', compact('tutors'));
    }

    /**
     * Display the tutor's "Store" / Profile.
     */
    public function show(User $tutor)
    {
        if ($tutor->role !== 'tutor') {
            abort(404);
        }

        $tutor->load(['privateTutor', 'articles' => function ($query) {
            $query->approved()->latest()->take(5);
        }]);

        return view('tutors.show', compact('tutor'));
    }
}
