<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/berita', [PostController::class, 'index']);
Route::get('/berita/post/{slug}', [PostController::class, 'showPost']);

Route::get('/status-laporan', function () {
    return view('statuses');
});

Route::get('/laporkan', [ReportController::class, 'create'])->name('reports');
Route::post('/laporkan', [ReportController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
