<?php

namespace App\Http\Controllers\Niv1;

use App\Models\RelImposition;
use App\Models\ProfilImposition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RelImpositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Récupération de l'id de l'utilisateur
        $userid = Auth::user()->id;

        //Récupération du nombre de profil d'imposition d'un utilisateur pour vérification
        $NbrProfilImposition = ProfilImposition::all()->where('user_id',$userid)->count();
        if($NbrProfilImposition == 1){
            //Récupération du profil d'imposition associé à l'utilisateur
            $profil_imposition_id = User::find($userid)->ProfilImpositions->Pluck('id');
            $RelImpositions = ProfilImposition::findorfail($profil_imposition_id[0])->RelImpositions;
            return view('datamgt.module2.relimposition.index', compact('RelImpositions'));
        }
        else{
            return back()->with('alerte',"Attention: Vous devez créer votre profil d'imposition avant d'accèder à la section - Imposition ");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userid = Auth::user()->id;
        //Définition du chps 'profil_imposition_id' du relevé d'imposition lié à l'utilisateur
        $profils = User::find($userid)->ProfilImpositions;
        foreach ($profils as $profil) {
           $profil_imposition_id = $profil->id;
        }
        //Définition du chps 'domaine_id' du domaine 'Impôt' lié à l'utilisateur
        $domaines = User::find($userid)->Domaines;
        foreach ($domaines as $domaine) {
            $checkdomaine = $domaine->NomDomaine;
           if( $checkdomaine == 'Impôt' ){
            $domaine_id = $domaine->id;
           }
        }
        return view('datamgt.module2.relimposition.create',compact('profil_imposition_id', 'domaine_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $Request)
    {
        RelImposition::create($Request->all());
        return redirect()->route('RelImpositions.index')->with('message_relimposition', 'le relevé d\'imposition a été créé');
        // return "Dans le controleur!";
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RelImposition $RelImposition, $id)
    {
        $RelImposition = RelImposition::findOrFail($id);
        return view('datamgt.module2.relimposition.edit', compact('RelImposition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $RelImposition = RelImposition::findOrFail($id)->update($request->all());
        return redirect()->route('RelImpositions.index')->with('message_relimposition', 'le relevé d\'imposition a été mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RelImposition::where('id',$id)->delete();
        return redirect()->route('RelImpositions.index')->with('message_relimposition', 'le relevé d\'imposition a été supprimée');
    }
}
