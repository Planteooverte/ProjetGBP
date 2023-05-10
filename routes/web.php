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

//Accueil
Route::get('/', function () {
    return view('welcome2');
});

//Route Page Principale
Route::get('/Gdonnees', [\App\Http\Controllers\AdminData::class, 'index']);
Route::get('/DataMgt', [\App\Http\Controllers\AdminData::class, 'indexlist'])->name('GestionDonnee');

//Route Formulaire Create - Page DataMgt
Route::post('/DataMgt/domaine', [\App\Http\Controllers\Niv1\DomaineController::class, 'store'])->name('Domaine.store');
Route::post('/DataMgt/profilimposition', [\App\Http\Controllers\Niv1\ProfilImpositionController::class, 'store'])->name('ProfilImposition.store');
Route::post('/DataMgt/relimposition', [\App\Http\Controllers\Niv1\RelImpositionController::class, 'store'])->name('RelImposition.store');
Route::post('/DataMgt/entreprise', [\App\Http\Controllers\Niv1\EntrepriseController::class, 'store'])->name('Entreprise.store');
Route::post('/DataMgt/fichedepaye', [\App\Http\Controllers\Niv1\FicheDePayeController::class, 'store'])->name('FicheDePaye.store');
Route::post('/DataMgt/inflation', [\App\Http\Controllers\Niv1\InflationController::class, 'store'])->name('Inflation.store');

//Brezze Page Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Page de Gestion des Données
// Route::get('/dataManagement/new', [App\Http\Controllers\Niv2\SuperEditorController::class, 'editor'])->name('createdata.editor');
Route::get('/dataManagement/list', [App\Http\Controllers\Niv2\SuperEditorController::class, 'indexor'])->name('listgeneral.indexor');

//CRUD table comptebancaire
Route::get('/dataManagement/comptebancaire/new', [\App\Http\Controllers\Niv1\CompteBancaireController::class, 'create'])->name('CompteBancaires.create');
Route::post('/dataManagement/comptebancaire/ajout', [\App\Http\Controllers\Niv1\CompteBancaireController::class, 'store'])->name('CompteBancaire.store');
Route::get('/dataManagement/comptebancaire/detail/{id}', [\App\Http\Controllers\Niv1\CompteBancaireController::class, 'edit'])->name('CompteBancaires.edit');
Route::post('/dataManagement/comptebancaire/màj/{id}', [\App\Http\Controllers\Niv1\CompteBancaireController::class, 'update'])->name('CompteBancaires.update');
Route::get('/dataManagement/comptebancaire/Suppr/{id}', [\App\Http\Controllers\Niv1\CompteBancaireController::class, 'destroy'])->name('CompteBancaires.destroy');
//CRUD table domaine
Route::get('/dataManagement/domaine/new', [\App\Http\Controllers\Niv1\DomaineController::class, 'create'])->name('Domaines.create');
Route::post('/dataManagement/domaine/ajout', [\App\Http\Controllers\Niv1\DomaineController::class, 'store'])->name('Domaines.store');
Route::get('/dataManagement/domaine/detail/{id}', [\App\Http\Controllers\Niv1\DomaineController::class, 'edit'])->name('Domaines.edit');
Route::post('/dataManagement/domaine/màj/{id}', [\App\Http\Controllers\Niv1\DomaineController::class, 'update'])->name('Domaines.update');
Route::get('/dataManagement/domaine/Suppr/{id}', [\App\Http\Controllers\Niv1\DomaineController::class, 'destroy'])->name('Domaines.destroy');
//CRUD table profil imposition
Route::get('/dataManagement/profilimposition/new', [\App\Http\Controllers\Niv1\ProfilImpositionController::class, 'create'])->name('ProfilImpositions.create');
Route::post('/dataManagement/profilimposition/ajout', [\App\Http\Controllers\Niv1\ProfilImpositionController::class, 'store'])->name('ProfilImpositions.store');
Route::get('/dataManagement/profilimposition/detail/{id}', [\App\Http\Controllers\Niv1\ProfilImpositionController::class, 'edit'])->name('ProfilImpositions.edit');
Route::post('/dataManagement/profilimposition/màj/{id}', [\App\Http\Controllers\Niv1\ProfilImpositionController::class, 'update'])->name('ProfilImpositions.update');
Route::get('/dataManagement/profilimposition/Suppr/{id}', [\App\Http\Controllers\Niv1\ProfilImpositionController::class, 'destroy'])->name('ProfilImpositions.destroy');
//CRUD table entreprise
Route::get('/dataManagement/entreprise/new', [\App\Http\Controllers\Niv1\EntrepriseController::class, 'create'])->name('Entreprises.create');
Route::post('/dataManagement/entreprise/ajout', [\App\Http\Controllers\Niv1\EntrepriseController::class, 'store'])->name('Entreprises.store');
Route::get('/dataManagement/entreprise/detail/{id}', [\App\Http\Controllers\Niv1\EntrepriseController::class, 'edit'])->name('Entreprises.edit');
Route::post('/dataManagement/entreprise/màj/{id}', [\App\Http\Controllers\Niv1\EntrepriseController::class, 'update'])->name('Entreprises.update');
Route::get('/dataManagement/entreprise/Suppr/{id}', [\App\Http\Controllers\Niv1\EntrepriseController::class, 'destroy'])->name('Entreprises.destroy');
//CRUD table inflation
Route::get('/dataManagement/inflation/new', [\App\Http\Controllers\Niv1\InflationController::class, 'create'])->name('Inflations.create');
Route::post('/dataManagement/inflation/ajout', [\App\Http\Controllers\Niv1\InflationController::class, 'store'])->name('Inflations.store');
Route::get('/dataManagement/inflation/detail/{id}', [\App\Http\Controllers\Niv1\InflationController::class, 'edit'])->name('Inflations.edit');
Route::post('/dataManagement/inflation/màj/{id}', [\App\Http\Controllers\Niv1\InflationController::class, 'update'])->name('Inflations.update');
Route::get('/dataManagement/inflation/Suppr/{id}', [\App\Http\Controllers\Niv1\InflationController::class, 'destroy'])->name('Inflations.destroy');

//CRUD table relevé imposition

//CRUD table fiche de paye



//Page de Consultation des relevés (bancaire, imposition, salaires, inflation)
Route::get('/report', function () { return view('report'); })->name('report');

//Brezze Authentification
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
