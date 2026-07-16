<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TutorController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/tutors', [TutorController::class, 'index'])->name('tutors.index');
Route::get('/tutors/{tutor}', [TutorController::class, 'show'])->name('tutors.show');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Dashboard Route (Breeze)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Role-based Dashboard Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'role:tutor,author'])->group(function () {
    Route::get('/tutor/dashboard', function () {
        return view('tutor.dashboard');
    })->name('tutor.dashboard');
    
    // Tutor Profile Management
    Route::get('/tutor/profile', [\App\Http\Controllers\Tutor\ProfileController::class, 'edit'])->name('tutor.profile.edit');
    Route::post('/tutor/profile', [\App\Http\Controllers\Tutor\ProfileController::class, 'update'])->name('tutor.profile.update');
    Route::post('/tutor/availability', [\App\Http\Controllers\Tutor\ProfileController::class, 'updateAvailability'])->name('tutor.availability.update');
    Route::delete('/tutor/availability/{availability}', [\App\Http\Controllers\Tutor\ProfileController::class, 'deleteAvailability'])->name('tutor.availability.delete');
    
    // Tutor Courses
    Route::get('/tutor/courses', [CourseController::class, 'tutorCourses'])->name('tutor.courses.index');
    Route::get('/tutor/courses/create', [CourseController::class, 'create'])->name('tutor.courses.create');
    Route::post('/tutor/courses', [CourseController::class, 'store'])->name('tutor.courses.store');
    
    // Video Meeting
    Route::get('/bookings/{booking}/meeting', function (\App\Models\Booking $booking) {
        return view('tutor.meeting', compact('booking'));
    })->name('booking.meeting');
});

Route::middleware(['auth', 'role:student,parent'])->group(function () {
    Route::get('/student/dashboard', function () {
        return view('student.dashboard');
    })->name('student.dashboard');
});

// Booking Routes
Route::middleware('auth')->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/tutors/{tutor}/book', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/tutors/{tutor}/book', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::patch('/bookings/{booking}/confirm', [BookingController::class, 'confirm'])->name('bookings.confirm');
    Route::patch('/bookings/{booking}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
    Route::patch('/bookings/{booking}/complete', [BookingController::class, 'complete'])->name('bookings.complete');
    
    // Payment Routes
    Route::get('/bookings/{booking}/payment', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/bookings/{booking}/payment', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/bookings/{booking}/payment/instructions', [PaymentController::class, 'instructions'])->name('payment.instructions');
});

// Chat Routes
Route::middleware('auth')->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/{chat}', [ChatController::class, 'show'])->name('chat.show');
    Route::get('/tutors/{tutor}/chat', [ChatController::class, 'create'])->name('chat.create');
    Route::post('/chat/{chat}/message', [ChatController::class, 'store'])->name('chat.message');
});

// Auth Routes (Breeze)
require __DIR__ . '/auth.php';