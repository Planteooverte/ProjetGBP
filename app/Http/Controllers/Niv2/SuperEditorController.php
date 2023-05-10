<?php

namespace App\Http\Controllers\Niv2;

use Illuminate\Http\Request;
use App\Models\CompteBancaire;
use App\Models\Domaine;
use App\Models\ProfilImposition;
use App\Models\RelImposition;
use App\Models\Entreprise;
use App\Models\User;
use App\Models\FicheDePaye;
use App\Models\Inflation;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuperEditorController extends Controller
{
    public function indexor() {
        // $CompteBancaires = CompteBancaire::withTrashed()->latest('title')->paginate(12);
        $userid = Auth::user()->id;
        $CompteBancaires = CompteBancaire::all()->where('user_id',$userid);
        $Domaines = Domaine::all()->where('user_id',$userid);
        $ProfilImpositions = ProfilImposition::all()->where('user_id',$userid);
        $NbrProfilImposition = ProfilImposition::all()->where('user_id',$userid)->count();
        $Entreprises = Entreprise::all();
        $Inflations = Inflation::all();

        $FicheDePayes = FicheDePaye::select('*')
                            ->join('entreprises', 'fiche_de_payes.entreprise_id', '=', 'entreprises.id')
                            ->join('users_entreprises', 'entreprises.id', '=', 'users_entreprises.entreprise_id')
                            ->join('users', 'users_entreprises.user_id', '=', 'users.id')
                            ->where('user_id',$userid);
        $RelImpositions = RelImposition::select('*')
                            ->join('profil_impositions', 'rel_impositions.profil_imposition_id', '=', 'profil_impositions.id')
                            ->join('users', 'profil_impositions.user_id', '=', 'users.id')
                            ->where('user_id',$userid);
        // $Inflations = Inflation::select('*')
        //                     ->join('users_inflations', 'inflations.id', '=', 'users_inflation.inflation_id')
        //                     ->join('users', 'users_inflations.user_id', '=', 'users.id')
        //                     ->where('user_id',$userid);
        //Prévoir requêtes pour operation bancaire & fichier Csv
        return view('listgeneral', compact('CompteBancaires', 'Domaines', 'ProfilImpositions', 'NbrProfilImposition', 'Entreprises',
                                           'FicheDePayes', 'RelImpositions', 'Inflations'));
    }

    public function editor() {
        $user = Auth::user()->id;
        return view('createdata', [
            'CompteBancaires' => CompteBancaire::all()->where('user_id',$user),
            //à enrichier avec le reste des objets pour traitement CREATE
        ]);
    }
}
