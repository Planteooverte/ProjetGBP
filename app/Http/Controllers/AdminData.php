<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminData extends Controller
{
    public function index(Request $request) {       
        return view('Gdonnees');
    }

    public function test() {
        return 'le lien marche';
    }

    public function formDataMgtC() {
        return view('DataMgt');
    }
}
