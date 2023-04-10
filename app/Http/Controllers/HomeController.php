<?php

namespace App\Http\Controllers;

use App\Models\OperationBancaire;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $OperationBancaire = OperationBancaire::all();

        return view('home', compact('OperationBancaire'));
    }
}
