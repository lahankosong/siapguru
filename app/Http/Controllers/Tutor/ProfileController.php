<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Availability;
use App\Models\PrivateTutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the tutor's profile settings.
     */
    public function edit()
    {
        $user = Auth::user();
        $tutorProfile = $user->privateTutor;
        $availabilities = $user->availabilities()->get();

        return view('tutor.profile.edit', compact('user', 'tutorProfile', 'availabilities'));
    }

    /**
     * Update the tutor's profile.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'full_name' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'subjects' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:100',
            'hourly_rate' => 'nullable|numeric|min:0',
            'experience_years' => 'nullable|integer|min:0',
            'qualifications' => 'nullable|string',
        ]);

        // Update user
        $user->update([
            'full_name' => $validated['full_name'] ?? null,
            'bio' => $validated['bio'] ?? null,
            'subjects' => $validated['subjects'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'city' => $validated['city'] ?? null,
        ]);

        // Update or create private tutor profile
        $tutorProfile = $user->privateTutor;
        if (!$tutorProfile) {
            $tutorProfile = PrivateTutor::create(['user_id' => $user->id]);
        }
        
        $tutorProfile->update([
            'hourly_rate' => $validated['hourly_rate'] ?? null,
            'experience_years' => $validated['experience_years'] ?? 0,
            'qualifications' => $validated['qualifications'] ?? null,
        ]);

        // Handle availability updates
        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        foreach ($days as $day) {
            if ($request->has("availabilities.{$day}")) {
                $availData = $request->input("availabilities.{$day}");
                if (!empty($availData['start']) && !empty($availData['end'])) {
                    Availability::updateOrCreate(
                        [
                            'tutor_id' => $user->id,
                            'day' => $day,
                        ],
                        [
                            'start_time' => $availData['start'],
                            'end_time' => $availData['end'],
                            'is_available' => true,
                        ]
                    );
                }
            }
        }

        return back()->with('status', 'profile-updated');
    }

    /**
     * Update availability.
     */
    public function updateAvailability(Request $request)
    {
        $validated = $request->validate([
            'day' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $availability = Availability::updateOrCreate(
            [
                'tutor_id' => Auth::id(),
                'day' => $validated['day'],
            ],
            [
                'start_time' => $validated['start_time'],
                'end_time' => $validated['end_time'],
                'is_available' => true,
            ]
        );

        return response()->json(['success' => true, 'availability' => $availability]);
    }

    /**
     * Delete availability.
     */
    public function deleteAvailability(Availability $availability)
    {
        if ($availability->tutor_id !== Auth::id()) {
            abort(403);
        }

        $availability->delete();

        return back()->with('status', 'availability-deleted');
    }
}