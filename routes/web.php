<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/Gdonnees', [\App\Http\Controllers\AdminData::class, 'index']);

Route::get('/DataMgt', [\App\Http\Controllers\AdminData::class, 'formDataMgtC'])->name('GestionDonnee');

Route::post('/DataMgt/comptebancaire', [\App\Http\Controllers\CompteBancaireController::class, 'store'])->name('CompteBancaire.store');

// Route::resource('/DataMgt/CompteBancaire', \App\Http\Controllers\Sfg\CompteBancaire::class);

// Route::get('/Gdata', [\App\Http\Controllers\AdminData::class, 'test'])->name('ref');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
