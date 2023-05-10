<?php

namespace App\Http\Controllers\Niv1;

use App\Models\Inflation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class InflationController extends Controller
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
        return view('datamgt.module4.inflation.create',compact('userid'));
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
        $inflation = Inflation::create($Request->all());
        $inflation->Users()->attach($Request['user_id']);
        return redirect()->route('listgeneral.indexor')->with('message_inflation', 'l\'inflation a été créée');
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
    public function edit(Request $request, Inflation $Inflation, $id)
    {
        $Inflation = Inflation::findOrFail($id);
        return view('datamgt.module4.inflation.edit', compact('Inflation'));
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
        $Inflation = Inflation::findOrFail($id)->update($request->all());
        return redirect()->route('listgeneral.indexor')->with('message_inflation', 'l\'inflation a été mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inflation::where('id',$id)->delete();
        return redirect()->route('listgeneral.indexor')->with('message_inflation', 'l\'inflation a été supprimée');
    }

}
