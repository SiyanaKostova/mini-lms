<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/

// Начална страница със списък с курсове
Route::get('/', [CourseController::class, 'index'])->name('courses.index');

// Създаване на курс (преместено по-горе, за да не го погълне slug route)
Route::middleware(['auth'])->group(function () {
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
});

// Търсене
Route::get('/search', SearchController::class)->name('search');

// Преглед на курс по slug (трябва да стои след /courses/create)
Route::get('/courses/{course:slug}', [CourseController::class, 'show'])->name('courses.show');

/*
|--------------------------------------------------------------------------
| Routes, достъпни само за логнати потребители
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    // Курсове
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

    // Лекции
    Route::get('/courses/{course}/lectures/create', [LectureController::class, 'create'])->name('lectures.create');
    Route::post('/courses/{course}/lectures', [LectureController::class, 'store'])->name('lectures.store');

    // Профил
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Dashboard (по избор)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Breeze auth
require __DIR__.'/auth.php';
