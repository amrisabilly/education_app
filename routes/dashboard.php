<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guru\GuruController;
use App\Http\Controllers\Guru\LessonController as GuruLessonController;
use App\Http\Controllers\Guru\AssignmentController as GuruAssignmentController;
use App\Http\Controllers\Siswa\SiswaController;
use App\Http\Controllers\Siswa\LessonController as SiswaLessonController;
use App\Http\Controllers\Siswa\SubmissionController;
use App\Http\Controllers\Orangtua\OrangtuaController;
use App\Http\Controllers\ProfileController;

// Profile Routes (All Users)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});

// Guru Routes
Route::middleware(['auth', 'role:guru'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', [GuruController::class, 'dashboard'])->name('dashboard');

    // Course Management
    Route::get('/courses', [GuruController::class, 'courses'])->name('courses');
    Route::get('/courses/create', [GuruController::class, 'createCourse'])->name('courses.create');
    Route::post('/courses', [GuruController::class, 'storeCourse'])->name('courses.store');
    Route::get('/courses/{course}', [GuruController::class, 'showCourse'])->name('courses.show');
    Route::get('/courses/{course}/edit', [GuruController::class, 'editCourse'])->name('courses.edit');
    Route::put('/courses/{course}', [GuruController::class, 'updateCourse'])->name('courses.update');
    Route::delete('/courses/{course}', [GuruController::class, 'deleteCourse'])->name('courses.delete');
    Route::post('/courses/{course}/toggle-publish', [GuruController::class, 'togglePublish'])->name('courses.toggle-publish');

    // Lesson Management
    Route::get('/courses/{course}/lessons/create', [GuruLessonController::class, 'create'])->name('courses.lessons.create');
    Route::post('/courses/{course}/lessons', [GuruLessonController::class, 'store'])->name('courses.lessons.store');
    Route::get('/courses/{course}/lessons/{lesson}/edit', [GuruLessonController::class, 'edit'])->name('courses.lessons.edit');
    Route::put('/courses/{course}/lessons/{lesson}', [GuruLessonController::class, 'update'])->name('courses.lessons.update');
    Route::delete('/courses/{course}/lessons/{lesson}', [GuruLessonController::class, 'destroy'])->name('courses.lessons.destroy');

    // Assignment Management
    Route::get('/assignments', [GuruAssignmentController::class, 'index'])->name('assignments');
    Route::get('/courses/{course}/assignments/create', [GuruAssignmentController::class, 'create'])->name('courses.assignments.create');
    Route::post('/courses/{course}/assignments', [GuruAssignmentController::class, 'store'])->name('courses.assignments.store');
    Route::get('/assignments/{assignment}', [GuruAssignmentController::class, 'show'])->name('assignments.show');
    Route::post('/assignments/{assignment}/submissions/{submission}/grade', [GuruAssignmentController::class, 'grade'])->name('assignments.grade');
    Route::get('/courses/{course}/assignments/{assignment}/edit', [GuruAssignmentController::class, 'edit'])->name('courses.assignments.edit');
    Route::put('/courses/{course}/assignments/{assignment}', [GuruAssignmentController::class, 'update'])->name('courses.assignments.update');
    Route::delete('/courses/{course}/assignments/{assignment}', [GuruAssignmentController::class, 'destroy'])->name('courses.assignments.destroy');
});

// Siswa Routes
Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('dashboard');

    // Course Management
    Route::get('/courses', [SiswaController::class, 'courses'])->name('courses');
    Route::get('/courses/browse', [SiswaController::class, 'browseCourses'])->name('courses.browse');
    Route::post('/courses/{course}/enroll', [SiswaController::class, 'enrollCourse'])->name('courses.enroll');
    Route::get('/courses/{course}', [SiswaController::class, 'showCourse'])->name('courses.show');

    // Lesson Management
    Route::get('/courses/{course}/lessons/{lesson}', [SiswaLessonController::class, 'show'])->name('lessons.show');
    Route::post('/courses/{course}/lessons/{lesson}/complete', [SiswaLessonController::class, 'complete'])->name('lessons.complete');

    // Assignment Management
    Route::get('/assignments', [SiswaController::class, 'assignments'])->name('assignments');
    Route::post('/assignments/{assignment}/submit', [SubmissionController::class, 'store'])->name('assignments.submit');

    // Chatbot
    Route::post('/chatbot', [\App\Http\Controllers\Siswa\ChatbotController::class, 'chat'])->name('chatbot');
});

// Orangtua Routes
Route::middleware(['auth', 'role:orangtua'])->prefix('orangtua')->name('orangtua.')->group(function () {
    Route::get('/dashboard', [OrangtuaController::class, 'dashboard'])->name('dashboard');

    // Children Management
    Route::get('/children', [OrangtuaController::class, 'children'])->name('children');
    Route::post('/children/link', [OrangtuaController::class, 'linkChild'])->name('children.link');
    Route::get('/children/{child}/progress', [OrangtuaController::class, 'showChildProgress'])->name('children.progress');
    Route::get('/children/{child}/courses', [OrangtuaController::class, 'showChildCourses'])->name('children.courses');
});
