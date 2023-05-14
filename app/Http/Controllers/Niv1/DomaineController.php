<?php

namespace App\Http\Controllers\Niv1;

use App\Models\Domaine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DomaineController extends Controller
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

        //Récupération des domaines liés à un utilisateur
        $Domaines = Domaine::all()->where('user_id',$userid);
        return view('datamgt.module1.domaine.index', compact('Domaines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userid = Auth::user()->id;
        return view('datamgt.module1.domaine.create', compact('userid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $Request)
    {
        Domaine::create($Request->all());
        return redirect()->route('Domaines.index')->with('message_domaine', 'le domaine a été créé');
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
    public function edit(Domaine $Domaine, $id)
    {
        $Domaine = Domaine::findOrFail($id);
        return view('datamgt.module1.domaine.edit', compact('Domaine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domaine $Domaine, $id)
    {
        $Domaine = Domaine::findOrFail($id);
        $Domaine->update($request->all());
        return redirect()->route('Domaines.index')->with('message_domaine', 'le domaine a été mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Domaine::where('id',$id)->delete();
        return redirect()->route('Domaines.index')->with('message_domaine', 'le domaine a été supprimé');
    }
}
