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

// Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

//Route Page Principale
Route::get('/Gdonnees', [\App\Http\Controllers\AdminData::class, 'index']);
Route::get('/DataMgt', [\App\Http\Controllers\AdminData::class, 'indexlist'])->name('GestionDonnee');

//Route Formulaire Create - Page DataMgt
Route::post('/DataMgt/comptebancaire', [\App\Http\Controllers\Niv1\CompteBancaireController::class, 'store'])->name('CompteBancaire.store');
Route::post('/DataMgt/domaine', [\App\Http\Controllers\Niv1\DomaineController::class, 'store'])->name('Domaine.store');
Route::post('/DataMgt/profilimposition', [\App\Http\Controllers\Niv1\ProfilImpositionController::class, 'store'])->name('ProfilImposition.store');
Route::post('/DataMgt/relimposition', [\App\Http\Controllers\Niv1\RelImpositionController::class, 'store'])->name('RelImposition.store');
Route::post('/DataMgt/entreprise', [\App\Http\Controllers\Niv1\EntrepriseController::class, 'store'])->name('Entreprise.store');
Route::post('/DataMgt/fichedepaye', [\App\Http\Controllers\Niv1\FicheDePayeController::class, 'store'])->name('FicheDePaye.store');
Route::post('/DataMgt/inflation', [\App\Http\Controllers\Niv1\InflationController::class, 'store'])->name('Inflation.store');

//Brezze Authentification à greffer
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

require __DIR__.'/auth.php';
