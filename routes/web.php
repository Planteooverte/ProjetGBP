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

//Breeze Page Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Gestion des Données
//CRUD table comptebancaire
Route::get('/dataManagement/comptebancaire/list', [\App\Http\Controllers\Niv1\CompteBancaireController::class, 'index'])->name('CompteBancaires.index');
Route::get('/dataManagement/comptebancaire/new', [\App\Http\Controllers\Niv1\CompteBancaireController::class, 'create'])->name('CompteBancaires.create');
Route::post('/dataManagement/comptebancaire/ajout', [\App\Http\Controllers\Niv1\CompteBancaireController::class, 'store'])->name('CompteBancaire.store');
Route::get('/dataManagement/comptebancaire/detail/{id}', [\App\Http\Controllers\Niv1\CompteBancaireController::class, 'edit'])->name('CompteBancaires.edit');
Route::post('/dataManagement/comptebancaire/màj/{id}', [\App\Http\Controllers\Niv1\CompteBancaireController::class, 'update'])->name('CompteBancaires.update');
Route::get('/dataManagement/comptebancaire/Suppr/{id}', [\App\Http\Controllers\Niv1\CompteBancaireController::class, 'destroy'])->name('CompteBancaires.destroy');
//CRUD table domaine
Route::get('/dataManagement/domaine/list', [\App\Http\Controllers\Niv1\DomaineController::class, 'index'])->name('Domaines.index');
Route::get('/dataManagement/domaine/new', [\App\Http\Controllers\Niv1\DomaineController::class, 'create'])->name('Domaines.create');
Route::post('/dataManagement/domaine/ajout', [\App\Http\Controllers\Niv1\DomaineController::class, 'store'])->name('Domaines.store');
Route::get('/dataManagement/domaine/detail/{id}', [\App\Http\Controllers\Niv1\DomaineController::class, 'edit'])->name('Domaines.edit');
Route::post('/dataManagement/domaine/màj/{id}', [\App\Http\Controllers\Niv1\DomaineController::class, 'update'])->name('Domaines.update');
Route::get('/dataManagement/domaine/Suppr/{id}', [\App\Http\Controllers\Niv1\DomaineController::class, 'destroy'])->name('Domaines.destroy');
//CRUD table profil imposition
Route::get('/dataManagement/profilimposition/list', [\App\Http\Controllers\Niv1\ProfilImpositionController::class, 'index'])->name('ProfilImpositions.index');
Route::get('/dataManagement/profilimposition/new', [\App\Http\Controllers\Niv1\ProfilImpositionController::class, 'create'])->name('ProfilImpositions.create');
Route::post('/dataManagement/profilimposition/ajout', [\App\Http\Controllers\Niv1\ProfilImpositionController::class, 'store'])->name('ProfilImpositions.store');
Route::get('/dataManagement/profilimposition/detail/{id}', [\App\Http\Controllers\Niv1\ProfilImpositionController::class, 'edit'])->name('ProfilImpositions.edit');
Route::post('/dataManagement/profilimposition/màj/{id}', [\App\Http\Controllers\Niv1\ProfilImpositionController::class, 'update'])->name('ProfilImpositions.update');
Route::get('/dataManagement/profilimposition/Suppr/{id}', [\App\Http\Controllers\Niv1\ProfilImpositionController::class, 'destroy'])->name('ProfilImpositions.destroy');
//CRUD table entreprise
Route::get('/dataManagement/entreprise/list', [\App\Http\Controllers\Niv1\EntrepriseController::class, 'index'])->name('Entreprises.index');
Route::get('/dataManagement/entreprise/new', [\App\Http\Controllers\Niv1\EntrepriseController::class, 'create'])->name('Entreprises.create');
Route::post('/dataManagement/entreprise/ajout', [\App\Http\Controllers\Niv1\EntrepriseController::class, 'store'])->name('Entreprises.store');
Route::get('/dataManagement/entreprise/detail/{id}', [\App\Http\Controllers\Niv1\EntrepriseController::class, 'edit'])->name('Entreprises.edit');
Route::post('/dataManagement/entreprise/màj/{id}', [\App\Http\Controllers\Niv1\EntrepriseController::class, 'update'])->name('Entreprises.update');
Route::get('/dataManagement/entreprise/Suppr/{id}', [\App\Http\Controllers\Niv1\EntrepriseController::class, 'destroy'])->name('Entreprises.destroy');
//CRUD table inflation
Route::get('/dataManagement/inflation/list', [\App\Http\Controllers\Niv1\InflationController::class, 'index'])->name('Inflations.index');
Route::get('/dataManagement/inflation/new', [\App\Http\Controllers\Niv1\InflationController::class, 'create'])->name('Inflations.create');
Route::post('/dataManagement/inflation/ajout', [\App\Http\Controllers\Niv1\InflationController::class, 'store'])->name('Inflations.store');
Route::get('/dataManagement/inflation/detail/{id}', [\App\Http\Controllers\Niv1\InflationController::class, 'edit'])->name('Inflations.edit');
Route::post('/dataManagement/inflation/màj/{id}', [\App\Http\Controllers\Niv1\InflationController::class, 'update'])->name('Inflations.update');
Route::get('/dataManagement/inflation/Suppr/{id}', [\App\Http\Controllers\Niv1\InflationController::class, 'destroy'])->name('Inflations.destroy');
//CRUD table relevé imposition
Route::get('/dataManagement/relevé_imposition/list', [\App\Http\Controllers\Niv1\RelImpositionController::class, 'index'])->name('RelImpositions.index');
Route::get('/dataManagement/relevé_imposition/new', [\App\Http\Controllers\Niv1\RelImpositionController::class, 'create'])->name('RelImpositions.create');
Route::post('/dataManagement/relevé_imposition/ajout', [\App\Http\Controllers\Niv1\RelImpositionController::class, 'store'])->name('RelImpositions.store');
Route::get('/dataManagement/relevé_imposition/detail/{id}', [\App\Http\Controllers\Niv1\RelImpositionController::class, 'edit'])->name('RelImpositions.edit');
Route::post('/dataManagement/relevé_imposition/màj/{id}', [\App\Http\Controllers\Niv1\RelImpositionController::class, 'update'])->name('RelImpositions.update');
Route::get('/dataManagement/relevé_imposition/Suppr/{id}', [\App\Http\Controllers\Niv1\RelImpositionController::class, 'destroy'])->name('RelImpositions.destroy');
//CRUD table fiche de paye
Route::get('/dataManagement/fiche_paye/list', [\App\Http\Controllers\Niv1\FicheDePayeController::class, 'index'])->name('FichesDePaye.index');
Route::get('/dataManagement/fiche_paye/new', [\App\Http\Controllers\Niv1\FicheDePayeController::class, 'create'])->name('FichesDePaye.create');
Route::post('/dataManagement/fiche_paye/ajout', [\App\Http\Controllers\Niv1\FicheDePayeController::class, 'store'])->name('FichesDePaye.store');
Route::get('/dataManagement/fiche_paye/detail/{id}', [\App\Http\Controllers\Niv1\FicheDePayeController::class, 'edit'])->name('FichesDePaye.edit');
Route::post('/dataManagement/fiche_paye/màj/{id}', [\App\Http\Controllers\Niv1\FicheDePayeController::class, 'update'])->name('FichesDePaye.update');
Route::get('/dataManagement/fiche_paye/Suppr/{id}', [\App\Http\Controllers\Niv1\FicheDePayeController::class, 'destroy'])->name('FichesDePaye.destroy');
//CRUD table consommation
Route::get('/dataManagement/consommation/list', [\App\Http\Controllers\Niv1\ConsommationController::class, 'index'])->name('Consommations.index');
Route::get('/dataManagement/consommation/new', [\App\Http\Controllers\Niv1\ConsommationController::class, 'create'])->name('Consommations.create');
Route::post('/dataManagement/consommation/ajout', [\App\Http\Controllers\Niv1\ConsommationController::class, 'store'])->name('Consommations.store');
Route::get('/dataManagement/consommation/detail/{id}', [\App\Http\Controllers\Niv1\ConsommationController::class, 'edit'])->name('Consommations.edit');
Route::post('/dataManagement/consommation/màj/{id}', [\App\Http\Controllers\Niv1\ConsommationController::class, 'update'])->name('Consommations.update');
Route::get('/dataManagement/consommation/Suppr/{id}', [\App\Http\Controllers\Niv1\ConsommationController::class, 'destroy'])->name('Consommations.destroy');

//UPLOAD Files
Route::get('/dataManagement/upload-file/list', [\App\Http\Controllers\Niv1\FichierCsvController::class, 'index'])->name('FichierCsvs.index');
Route::get('/dataManagement/upload-file', [\App\Http\Controllers\Niv1\FichierCsvController::class, 'create'])->name('FichierCsvs.create');
Route::post('/dataManagement/upload-file', [\App\Http\Controllers\Niv1\FichierCsvController::class, 'fileuploadandstore'])->name('FichierCsvs.upload');
Route::get('/dataManagement/upload-file/Suppr/{id}', [\App\Http\Controllers\Niv1\FichierCsvController::class, 'destroy'])->name('FichierCsvs.destroy');

//CRUD table opération bancaire
Route::get('/dataManagement/operations-bancaire/vueimport', [\App\Http\Controllers\Niv1\OperationBancaireController::class, 'show'])->name('OperationBancaire.index');
Route::get('/dataManagement/operations-bancaire/import', [\App\Http\Controllers\Niv1\OperationBancaireController::class, 'store'])->name('OperationBancaire.index');


//Page de Consultation des relevés (bancaire, imposition, salaires, inflation)
Route::get('/report', function () { return view('report'); })->name('report');

//Breeze Authentification
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
