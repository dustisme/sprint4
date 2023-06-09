<?php

use App\Models\Trainer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainerController;
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

Route::post('/submit-form', [FormController::class, 'submitForm'])->name('submitForm');

Route::controller(TrainerController::class)->group(function () {
    Route::get('/trainers', 'index');
    Route::get('/trainer-info/{id}', 'show');
    Route::get('/trainer-registration', 'create');
    Route::get('/edit-info/{id}', 'edit');
    // Route::post('/trainers', 'store');
    // Route::patch('/trainers/{id}', 'update');
    // Route::delete('/trainers/{id}', 'destroy');
});
// Route::delete('/trainer-info/{id}', '');

// Route::redirect('/trainer-registration', '/trainers');

Route::controller(PokemonController::class)->group(function () {
    Route::get('/pokemon/{id}', 'show');
    Route::post('/pokemon', 'store');
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
