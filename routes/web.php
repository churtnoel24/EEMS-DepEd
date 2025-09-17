<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HealthCardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/health-card', [HealthCardController::class, 'create'])->name('health-card.create');
    Route::post('/health-card', [HealthCardController::class, 'store'])->name('health-card.store');

    Route::get('/health-card/ctr', [HealthCardController::class, 'ctr'])->name('health-card.ctr');
    Route::post('/health-card/ctr', [HealthCardController::class, 'ctrstore'])->name('health-card.ctrstore');

    Route::get('/health-cards/search', [HealthCardController::class, 'search'])->name('health-cards.search');

    Route::get('/ctrs', [HealthCardController::class, 'showCtrs'])->name('health-card.ctrs');
    Route::get('/ctrs/cards', [HealthCardController::class, 'showHealthCards'])->name('health-cards.cards');
    Route::resource('health-cards', HealthCardController::class);
});



require __DIR__.'/auth.php';
