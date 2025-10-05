<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HealthCardController;
use App\Http\Controllers\DentalCardController;
use App\Http\Controllers\SettingsController;

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

    Route::get('/dental-card', [DentalCardController::class, 'create'])->name('dental-card.create');
    Route::post('/dental-card', [DentalCardController::class, 'store'])->name('dental-card.store');

    Route::get('/health-card/ctr', [HealthCardController::class, 'ctr'])->name('health-card.ctr');
    Route::post('/health-card/ctr', [HealthCardController::class, 'ctrstore'])->name('health-card.ctrstore');

    Route::get('/health-cards/search', [HealthCardController::class, 'search'])->name('health-cards.search');

    Route::get('/ctrs', [HealthCardController::class, 'showCtrs'])->name('health-card.ctrs');
    Route::resource('health-cards', HealthCardController::class)->name('index', 'health-cards.index');

    // Settings Management Routes
    Route::prefix('settings')->group(function () {
        // Chief Complaints
        Route::post('/add-complaint', [SettingsController::class, 'addComplaint'])->name('settings.addcomplain');
        Route::delete('/delete-complaint/{id}', [SettingsController::class, 'deleteComplaint'])->name('settings.deletecomplain');

        // Treatments
        Route::post('/add-treatment', [SettingsController::class, 'addTreatment'])->name('settings.addtreatment');
        Route::delete('/delete-treatment/{id}', [SettingsController::class, 'deleteTreatment'])->name('settings.deletetreatment');

        // Recommendations
        Route::post('/add-recommendation', [SettingsController::class, 'addRecommendation'])->name('settings.addrecomm');
        Route::delete('/delete-recommendation/{id}', [SettingsController::class, 'deleteRecommendation'])->name('settings.deleterecomm');

        // Findings
        Route::post('/add-finding', [SettingsController::class, 'addFinding'])->name('settings.addfindings');
        Route::delete('/delete-finding/{id}', [SettingsController::class, 'deleteFinding'])->name('settings.deletefinding');

        // View all predefined items
        Route::get('/predefined-items', [SettingsController::class, 'showPredefinedItems'])->name('settings.predefined-items');
    });
});



require __DIR__ . '/auth.php';
