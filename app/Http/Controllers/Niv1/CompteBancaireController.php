<?php

namespace App\Http\Controllers\Niv1;

use App\Models\CompteBancaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompteBancaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Assurer par SuperEditorController
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Affichage du formulaire de création
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $Request)
    {
        //Enregistrement du formulaire de création
        CompteBancaire::create($Request->all());
        return back()->with('message', 'le compte a été créé');         // return "Dans le controleur!";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Affichage de la fiche d'un compte bancaire
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CompteBancaire $comptebancaire)
    {
        //Affichage de la fiche d'un compte bancaire avec intention du màj
        return view('edit', compact('comptebancaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompteBancaire $comptebancaire)
    {
        //Mise à jour d'un compte bancaire
        $comptebancaire->update($request->all());
        return back()->with('message', 'le compte a été mis à jour'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Destruction d'un compte bancaire
    }

    
 

}



