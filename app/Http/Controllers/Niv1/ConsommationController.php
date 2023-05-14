<?php

namespace App\Http\Controllers\Niv1;

use App\Models\Consommation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsommationController extends Controller
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

        //Récupération du nombre de domaine attaché à l'utilisateur avec unité
        $NbrDomaineConso = User::findorfail($userid)->Domaines->whereNotIn('Unite', ['sans'])->count();

        if($NbrDomaineConso == 3){
            //Récupération des domaines de l'utilisateur lié aux consommations
            $NCDomaines = User::findorfail($userid)->Domaines->whereNotIn('Unite', ['sans']);   //NCDomaines : Not Complet Domaines

            //Récupération des consommations associées à l'utilisateur
            $Consommations = User::findorfail($userid)->Consommations;

            //Récupération des domaines en cohérence avec les consommations de l'utilisateur
            $Domaines = [];     //stockage de domaine associé à chacune des consommations de l'utilisateur
            $i=0;               //Index de parcours de Domaines
            foreach ($Consommations as $Consommation) {
                $domaine_id = $Consommation->domaine_id;

                foreach ($NCDomaines as $NCDomaine) {
                    $idDomaine = $NCDomaine->id;
                    if($domaine_id == $idDomaine){
                        $Domaines[$i] = $NCDomaine;
                        $i++;
                    }
                }
            }
            return view('datamgt.module2.consommation.index',compact('Domaines','Consommations'));
        }
        else{
            return back()->with('alerte',"Attention: veuillez rajouter les domaines - Eau(m3), Electricité(kW), Essence pour accèder à la section : Consommation ");
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

        //Récupération des domaines de l'utilisateur lié aux consommations
        $Domaines = User::findorfail($userid)->Domaines->whereNotIn('Unite', ['sans']);

        return view('datamgt.module2.consommation.create',compact('Domaines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $Request)
    {
        Consommation::create($Request->all());
        return redirect()->route('Consommations.index')->with('message_consommation', 'La consommation a été créé');
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
    public function edit(Consommation $Consommation, $id)
    {
        //Récupération de la fiche de paye à modifier
        $Consommation = Consommation::findOrFail($id);

        //Récupération de l'id de l'utilisateur
        $userid = Auth::user()->id;

        //Récupération des domaines de l'utilisateur lié aux consommations - Liste non exhaustive
        $Domaines = User::findorfail($userid)->Domaines->whereNotIn('Unite', ['sans']);

        return view('datamgt.module2.consommation.edit', compact('Consommation','Domaines'));
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
        $Consommation = Consommation::findOrFail($id)->update($request->all());
        return redirect()->route('Consommations.index')->with('message_consommation', 'La consommation a été mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Consommation::where('id',$id)->delete();
        return redirect()->route('Consommations.index')->with('message_consommation', 'La consommation a été supprimée');
    }
}
