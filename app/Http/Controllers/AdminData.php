<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domaine;
use App\Models\CompteBancaire;
use App\Models\RelImposition;
use App\Models\FicheDePaye;
use App\Models\Inflation;
class AdminData extends Controller
{
    public function index(Request $request) {       
        return view('Gdonnees');
    }

    public function test() {
        return 'le lien marche';
    }

    public function indexlist() {
        return view('DataMgt', [
            'Domaines' => Domaine::all(),
            'CompteBancaires' => CompteBancaire::all(),
            'RelImpositions' => RelImposition::all(),
            'FicheDePayes' => FicheDePaye::all(),
            'Inflations' => Inflation::all(),
        ]);
    }
}
