<?php

namespace App\Http\Controllers\Niv1;

use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class EntrepriseController extends Controller
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

        //Récupération des entreprises associées à l'utilisateur
        $Entreprises = User::findorfail($userid)->Entreprises;
        return view('datamgt.module3.entreprise.index', compact('Entreprises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userid = Auth::user()->id;
        return view('datamgt.module3.entreprise.create',compact('userid'));
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
        $entreprise = Entreprise::create($Request->all());
        $entreprise->Users()->attach($Request['user_id']);
        return redirect()->route('Entreprises.index')->with('message_entreprise', 'l\'entreprise a été créée');
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
    public function edit(Entreprise $Entreprise, $id)
    {
        $Entreprise = Entreprise::findOrFail($id);
        return view('datamgt.module3.entreprise.edit', compact('Entreprise'));
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
        $Entreprise = Entreprise::findOrFail($id)->update($request->all());
        return redirect()->route('Entreprises.index')->with('message_entreprise', 'l\'entreprise a été mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Entreprise::where('id',$id)->delete();
        return redirect()->route('Entreprises.index')->with('message_entreprise', 'l\'entreprise a été supprimée');
    }
}
