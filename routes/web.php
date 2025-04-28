<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PetualanganController;
use App\Http\Controllers\Admin\SoalController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MultiplayerController;
use App\Http\Controllers\QuizDashboardController;
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

// CRUD soal oleh teacher
Route::prefix('teacher')->middleware(['auth', 'verified', 'rolemanager:teacher'])->name('teacher.')->group(function () {
    Route::get('soal', [SoalController::class, 'index'])->name('quiz.index');
    Route::get('soal/create', [SoalController::class, 'create'])->name('quiz.create');
    Route::post('soal', [SoalController::class, 'store'])->name('quiz.store');
    Route::get('soal/{id}/edit', [SoalController::class, 'edit'])->name('quiz.edit');

    // Menerima POST dan PUT untuk update
    Route::match(['post', 'put'], 'soal/{id}/update', [SoalController::class, 'update'])->name('quiz.update');

    Route::match(['delete', 'get'],'soal/{id}', [SoalController::class, 'destroy'])->name('quiz.destroy');

    // User management oleh teacher
    Route::resource('users', UserController::class);
    Route::resource('materi', TeacherMateri::class);
        Route::get('/diskusi', [TeacherDiscussionController::class, 'index'])->name('diskusi.index');
        Route::get('/diskusi/{id}', [TeacherDiscussionController::class, 'show'])->name('diskusi.show');
        Route::post('/diskusi/reply', [TeacherDiscussionController::class, 'reply'])->name('discussions.reply');
});

Route::prefix('student')->middleware(['auth', 'verified', 'rolemanager:student'])->name('student.')->group(function () {
    Route::get('materi', [StudentMateri::class, 'index'])->name('materi.index');
        Route::get('materi/{id}', [StudentMateri::class, 'show'])->name('materi.show');
        Route::post('/discussions', [StudentDiscussionController::class, 'store'])->name('discussions.store');
        Route::post('/discussions/reply', [StudentDiscussionController::class, 'reply'])->name('discussions.reply');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/petualangan', [GameController::class, 'index']);

// Route untuk game petualangan edukasi
Route::prefix('quiz')->middleware(['auth', 'verified', 'rolemanager:student'])->group(function () {
    Route::get('/petualangan', [PetualanganController::class, 'index'])->name('quiz.petualangan.index');
    Route::post('/petualangan/submit', [PetualanganController::class, 'submit'])->name('quiz.petualangan.submit');
    Route::get('/petualangan/map', [PetualanganController::class, 'map'])->name('quiz.petualangan.map');
    Route::post('/petualangan/submit-level', [PetualanganController::class, 'submitLevel'])->name('quiz.petualangan.submitLevel');
    Route::match(['get', 'post'], '/quiz/petualangan/reset', [PetualanganController::class, 'resetProgress'])->name('quiz.petualangan.reset');
    Route::get('quiz/petualangan/next', [PetualanganController::class, 'nextSoal'])->name('quiz.petualangan.next');
    Route::get('quiz/petualangan/prev', [PetualanganController::class, 'prevSoal'])->name('quiz.petualangan.prev');
});

Route::get('/petualangan/music', function () {
    return view('partials.music');
})->name('petualangan.music');

// Route untuk kuis multiplayer
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/game/multiplayer', [MultiplayerController::class, 'index'])->name('multiplayer.index');
    Route::post('/game/multiplayer', [MultiplayerController::class, 'submit'])->name('multiplayer.submit');
    Route::get('/game/leaderboard', [MultiplayerController::class, 'leaderboard'])->name('multiplayer.leaderboard');
    Route::get('/game/multiplayer/check', [MultiplayerController::class, 'checkMatch'])->name('multiplayer.checkMatch');
    Route::get('/game/multiplayer/result', [MultiplayerController::class, 'result'])->name('multiplayer.result');
});

// Dashboard utama quiz siswa
Route::middleware(['auth', 'verified', 'rolemanager:student'])->prefix('quiz')->name('quiz.')->group(function () {
    Route::get('/', [QuizDashboardController::class, 'index'])->name('index');
});

require __DIR__.'/auth.php';
