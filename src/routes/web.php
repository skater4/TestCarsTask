<?php

use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/vote', [VoteController::class, 'index'])->name('vote.index');
Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
