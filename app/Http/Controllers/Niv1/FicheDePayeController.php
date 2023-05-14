<?php

namespace App\Http\Controllers\Niv1;

use App\Models\FicheDePaye;
use App\Models\User;
use App\Models\Entreprise;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FicheDePayeController extends Controller
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

        //Récupération du nombre d'entreprise ayant employé l'utilisateur en cours pour vérification
        $NbrEntreprise = User::findorfail($userid)->Entreprises->count();

        if($NbrEntreprise >= 1){
            //Récupération des fiches de paye associées à l'utilisateur
            $FicheDePayes=User::findorfail($userid)->FicheDePayes;

            //Récupération des noms d'entreprises associées aux fiches de paye de l'utilisateur
            $entreprise_id = User::findorfail($userid)->FicheDePayes->Pluck('entreprise_id');
            $cptmax = User::findorfail($userid)->FicheDePayes->Pluck('entreprise_id')->count();
            $NomEntreprises = [];
            for($i=0; $i<$cptmax; $i++) {
                $NomEntreprise = Entreprise::findorfail($entreprise_id[$i])->NomEntreprise;
                $NomEntreprises[$i] = $NomEntreprise;
            }

            return view('datamgt.module3.fichedepaye.index',compact('FicheDePayes','NomEntreprises'));
        }
        else{
            return back()->with('alerte',"Attention: Vous devez déclarer au moins un employeur avant d'accèder à la section - Fiche de paye ");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Récupération de l'id de l'utilisateur
        $userid = Auth::user()->id;

        //Préparation liste déroulante 'entreprise_id' de la fiche de paye lié à l'utilisateur
        $entreprises = User::find($userid)->Entreprises;

        //Définition du chps 'domaine_id' du domaine 'Impôt' lié à l'utilisateur
        $domaine_service = User::find($userid)->Domaines->where('NomDomaine', '=', 'Salaire')->Pluck('id');
        $domaine_id = $domaine_service[0];

        return view('datamgt.module3.fichedepaye.create',compact('entreprises', 'domaine_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $Request)
    {
       FicheDePaye::create($Request->all());
       return redirect()->route('FichesDePaye.index')->with('message_fichedepaye', 'La fiche de paye a été créé');
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
    public function edit(FicheDePaye $FicheDePaye, $id)
    {
        //Récupération de la fiche de paye à modifier
        $FicheDePaye = FicheDePaye::findOrFail($id);

        //Récupération de l'id de l'utilisateur
        $userid = Auth::user()->id;

        //Préparation liste déroulante 'entreprise_id' de la fiche de paye lié à l'utilisateur
        $entreprises = User::find($userid)->Entreprises;

        //Définition du chps 'domaine_id' du domaine 'Impôt' lié à l'utilisateur
        $domaine_service = User::find($userid)->Domaines->where('NomDomaine', '=', 'Salaire')->Pluck('id');
        $domaine_id = $domaine_service[0];

        return view('datamgt.module3.fichedepaye.edit', compact('FicheDePaye','entreprises','domaine_id'));
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
        $FicheDePaye = FicheDePaye::findOrFail($id)->update($request->all());
        return redirect()->route('FichesDePaye.index')->with('message_fichedepaye', 'La fiche de paye a été mise à jour');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FicheDePaye::where('id',$id)->delete();
        return redirect()->route('FichesDePaye.index')->with('message_fichedepaye', 'La fiche de paye a été supprimée');
    }
}
