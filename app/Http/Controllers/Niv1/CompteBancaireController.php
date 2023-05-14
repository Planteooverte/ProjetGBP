<?php

namespace App\Http\Controllers\Niv1;

use App\Models\CompteBancaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompteBancaire as CompteBancaireRequest;


class CompteBancaireController extends Controller
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

        //Récupération des compte bancaire lié à un utilisateur
        $CompteBancaires = CompteBancaire::all()->where('user_id',$userid);
        return view('datamgt.module1.comptebancaire.index', compact('CompteBancaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userid = Auth::user()->id;
        return view('datamgt.module1.comptebancaire.create',compact('userid'));
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
        return redirect()->route('CompteBancaires.index')->with('message_comptebancaire', 'le compte a été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Non utilisé
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CompteBancaire $CompteBancaire, $id)
    {
        $CompteBancaire = CompteBancaire::findOrFail($id);
        return view('datamgt.module1.comptebancaire.edit', compact('CompteBancaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompteBancaire $CompteBancaire, $id)
    {
        $CompteBancaire = CompteBancaire::findOrFail($id);
        $CompteBancaire->update($request->all());
        return redirect()->route('CompteBancaires.index')->with('message_comptebancaire', 'le compte a été mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CompteBancaire::where('id',$id)->delete();
        return redirect()->route('CompteBancaires.index')->with('message_comptebancaire', 'le compte a été supprimé');
    }
}
