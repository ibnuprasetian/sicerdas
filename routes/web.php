<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Student\DiscussionController as StudentDiscussionController;
use App\Http\Controllers\Teacher\DiscussionController as TeacherDiscussionController;
use App\Http\Controllers\Student\MateriController as StudentMateri;
use App\Http\Controllers\Teacher\MateriController as TeacherMateri;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('student/dashboard');
})->middleware(['auth', 'verified', 'rolemanager:student'])->name('student.dashboard');

Route::get('/teacher/dashboard', function () {
    return view('teacher/dashboard');
})->middleware(['auth', 'verified', 'rolemanager:teacher'])->name('teacher.dashboard');

Route::middleware(['auth'])->group(function () {
    // Teacher routes
    Route::middleware('rolemanager:teacher')->prefix('teacher')->name('teacher.')->group(function () {
        Route::resource('materi', TeacherMateri::class);
        Route::get('/diskusi', [TeacherDiscussionController::class, 'index'])->name('diskusi.index');
        Route::get('/diskusi/{id}', [TeacherDiscussionController::class, 'show'])->name('diskusi.show');
        Route::post('/diskusi/reply', [TeacherDiscussionController::class, 'reply'])->name('discussions.reply');
    });

    // Student routes
    Route::middleware('rolemanager:student')->prefix('student')->name('student.')->group(function () {
        Route::get('materi', [StudentMateri::class, 'index'])->name('materi.index');
        Route::get('materi/{id}', [StudentMateri::class, 'show'])->name('materi.show');
        Route::post('/discussions', [StudentDiscussionController::class, 'store'])->name('discussions.store');
        Route::post('/discussions/reply', [StudentDiscussionController::class, 'reply'])->name('discussions.reply');

    });
});

Route::middleware(['auth', 'verified', 'rolemanager:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::resource('users', UserController::class);
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// Route::middleware(['auth', 'role:teacher'])->group(function () {
//     Route::get('/teacher/materials', [MaterialController::class, 'index'])->name('teacher.materials');
//     Route::get('/teacher/materials/create', [MaterialController::class, 'create'])->name('teacher.materials.create');
//     Route::post('/teacher/materials', [MaterialController::class, 'store'])->name('teacher.materials.store');
// });

// Route::middleware(['auth', 'role:student'])->group(function () {
//     Route::get('/student/materials/{id}', [StudentController::class, 'showMaterial'])->name('student.materials.show');
//     Route::post('/student/materials/{id}/exam', [StudentController::class, 'submitExam'])->name('student.materials.submit');
// });
