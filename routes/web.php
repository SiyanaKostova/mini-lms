<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;

Route::get('/', [CourseController::class, 'index'])->name('courses.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
});

Route::get('/search', SearchController::class)->name('search');

Route::get('/courses/{course:slug}', [CourseController::class, 'show'])->name('courses.show');

Route::middleware(['auth'])->group(function () {
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

    Route::get('/courses/{course}/lectures/create', [LectureController::class, 'create'])->name('lectures.create');
    Route::post('/courses/{course}/lectures', [LectureController::class, 'store'])->name('lectures.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
