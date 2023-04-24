<?php

namespace App\Http\Controllers\Niv2;

use Illuminate\Http\Request;
use App\Models\CompteBancaire;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SuperEditorController extends Controller
{
    public function indexor() {
        // $CompteBancaires = CompteBancaire::withTrashed()->latest('title')->paginate(12);
        $user = Auth::user()->id;
        $CompteBancaires = CompteBancaire::all()->where('user_id',$user);
        return view('updatedata', compact('CompteBancaires'));
    }

    public function editor() {
        $user = Auth::user()->id;
        return view('createdata', [
            'CompteBancaires' => CompteBancaire::all()->where('user_id',$user),
            //à enrichier avec le reste des objets pour traitement CREATE
        ]);
    }
}
