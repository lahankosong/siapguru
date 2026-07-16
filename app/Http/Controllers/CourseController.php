<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of courses.
     */
    public function index(Request $request)
    {
        $courses = Course::active()->with('tutor');

        // Filter by type
        if ($request->filled('type')) {
            $courses->where('type', $request->type);
        }

        // Filter by subject
        if ($request->filled('subject')) {
            $courses->where('subject', 'like', '%' . $request->subject . '%');
        }

        // Filter by level
        if ($request->filled('level')) {
            $courses->where('level', $request->level);
        }

        $courses = $courses->latest()->paginate(12);

        return view('courses.index', compact('courses'));
    }

    /**
     * Display the specified course.
     */
    public function show(Course $course)
    {
        $course->load('tutor');
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for creating a course (tutor only).
     */
    public function create()
    {
        if (!Auth::user()->isTutor()) {
            abort(403);
        }

        return view('tutor.courses.create');
    }

    /**
     * Store a newly created course (tutor only).
     */
    public function store(Request $request)
    {
        if (!Auth::user()->isTutor()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:video,pdf,bank_soal,template,modul,ebook',
            'file_path' => 'nullable|file|max:10240',
            'thumbnail' => 'nullable|image|max:2048',
            'price' => 'required|numeric|min:0',
            'duration' => 'nullable|integer|min:0',
            'level' => 'nullable|string',
            'subject' => 'nullable|string',
        ]);

        $course = Auth::user()->courses()->create($validated);

        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('courses', 'public');
            $course->update(['file_path' => $filePath]);
        }

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('course_thumbnails', 'public');
            $course->update(['thumbnail' => $thumbnailPath]);
        }

        return redirect()->route('tutor.courses.index')
            ->with('success', 'Kursus berhasil dibuat!');
    }

    /**
     * Show tutor's courses.
     */
    public function tutorCourses()
    {
        $courses = Auth::user()->courses()->latest()->get();
        return view('tutor.courses.index', compact('courses'));
    }
}