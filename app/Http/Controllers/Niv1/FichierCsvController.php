<?php

namespace App\Http\Controllers\Niv1;

use App\Models\FichierCsv;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FichierCsvController extends Controller
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

        //Récupération des fichiers liés à un utilisateur
        $FichierCsvs = FichierCsv::all()->where('user_id',$userid);
        return view('datamgt.module1.fichiercvs.index', compact('FichierCsvs'));
    }

    /**
     * Show the form for record files
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Récupération de l'id de l'utilisateur
        $userid = Auth::user()->id;

        return view('datamgt.module1.fichiercvs.create',compact('userid'));
    }

    /**
     * Method to :
     * - validate the file size, mime type, and other limitations.
     * - Save property of FichierCsv: NomFichier, CheminFichier, timestamps, user_id
     *
     * @return \Illuminate\Http\Response
     */
    public function fileuploadandstore(Request $req)
    {
        //Récupération de l'id de l'utilisateur
        $userid = Auth::user()->id;

        //Vérification du fichier, upload du fichier, mise à jour de la BDD
        $req->validate([
        'file' => 'required|mimes:csv,txt,xlx,xls|max:2048'
        ]);
        $fileModel = new FichierCsv;
        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();                 //getClientOriginalName():Retrieving The Original Name Of An Uploaded File
            $fileOrigin = $req->file->getClientOriginalName();                          //Récupération du nom du fichier
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');    //upload du fichier en local sous /storage/app/public/uploads
            $fileModel->NomFichier = time().'_'.$req->file->getClientOriginalName();    //Marquage temporel sur le nom de fichier
            $fileModel->CheminFichier = '/storage/'.$filePath;                          //Récupération de la zone de stockage du fichier
            $fileModel->user_id = $userid;
            $fileModel->save();                                                         //Mise à jour de la base

            return redirect()->route('FichierCsvs.index')->with('message_fichier','Votre fichier a été déposé');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function datastore()
    {
       //Vérifier le format des données.
       //Insert en Bdd
       //Màj d'un Chps: 'Suivi traitement' dans Fichier Csv
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
    public function edit(FicheDePaye $FicheDePaye, $id)
    {
        //Form de mise à jour des éléments d'un fichier. Nom
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
        //Màj Nom du fichier
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        FichierCsv::where('id',$id)->delete();
        return redirect()->route('FichierCsvs.index')->with('message_fichier', 'Votre fichier a été supprimer');
    }










}
