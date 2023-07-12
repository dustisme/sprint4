<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainerFormController;
use App\Http\Controllers\BattleFormController;
use App\Http\Controllers\HomepageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomepageController::class);

Route::controller(TrainerFormController::class)->group(function() {
    Route::get('/trainers', 'index');
    Route::get('/new-trainer', 'create');
    Route::post('/trainer', 'store');
    Route::get('/trainer-info/{id}', 'show');
    Route::get('/edit-info/{id}', 'edit');
    Route::put('/trainer/{id}', 'update');
    Route::delete('/trainers/{id}', 'destroy');
});

Route::controller(BattleFormController::class)->group(function () {
    Route::get('/battle-results', 'index');
    Route::get('/new-battle', 'create');
    Route::post('/battle', 'store');
    Route::get('/battle-info/{id}', 'show');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
