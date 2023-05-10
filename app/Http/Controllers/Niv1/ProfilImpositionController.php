<?php

namespace App\Http\Controllers\Niv1;

use App\Models\ProfilImposition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfilImpositionController extends Controller
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
        $userid = Auth::user()->id;
        return view('datamgt.module2.profilimposition.create', compact('userid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $Request)
    {
        ProfilImposition::create($Request->all());
        return redirect()->route('listgeneral.indexor')->with('message_profilimposition', 'le profil a été créé');
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
    public function edit(Request $request, ProfilImposition $ProfilImposition, $id)
    {
        $ProfilImposition = ProfilImposition::findOrFail($id);
        return view('datamgt.module2.profilimposition.edit', compact('ProfilImposition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfilImposition $ProfilImposition, $id)
    {
        $ProfilImposition = ProfilImposition::findOrFail($id);
        $ProfilImposition->update($request->all()); 
        return redirect()->route('listgeneral.indexor')->with('message_profilimposition', 'le profil a été mis à jour'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProfilImposition::where('id',$id)->delete();
        return redirect()->route('listgeneral.indexor')->with('message_profilimposition', 'le profil a été supprimé');
    }
}
