<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Domaine;
use App\Models\Inflation;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        //Récupération de l'id de l'utilisateur nouvellement créé
        $userid = Auth::user()->id;

        //Création Jeu de donnée Domaine à chaque nouvel utilisateur
        Domaine::insert([   ['NomDomaine' => 'Bien être', 'Unite' => 'sans', 'user_id' => $userid],
                            ['NomDomaine' => 'Eau', 'Unite' => 'm3', 'user_id' => $userid],
                            ['NomDomaine' => 'Electricité', 'Unite' => 'kW', 'user_id' => $userid],
                            ['NomDomaine' => 'Essence', 'Unite' => 'L', 'user_id' => $userid],
                            ['NomDomaine' => 'Impôt', 'Unite' => 'sans', 'user_id' => $userid],
                            ['NomDomaine' => 'Loisir', 'Unite' => 'sans', 'user_id' => $userid],
                            ['NomDomaine' => 'Nourriture', 'Unite' => 'sans', 'user_id' => $userid],
                            ['NomDomaine' => 'Santé', 'Unite' => 'sans', 'user_id' => $userid],
                            ['NomDomaine' => 'Télécommunication', 'Unite' => 'sans', 'user_id' => $userid],
                            ['NomDomaine' => 'Transport', 'Unite' => 'sans', 'user_id' => $userid],

                            ['NomDomaine' => 'Indemnité Chômage', 'Unite' => 'sans', 'user_id' => $userid],
                            ['NomDomaine' => 'Remboursement Santé', 'Unite' => 'sans', 'user_id' => $userid],
                            ['NomDomaine' => 'Remboursement Impôt', 'Unite' => 'sans', 'user_id' => $userid],
                            ['NomDomaine' => 'Salaire', 'Unite' => 'sans', 'user_id' => $userid],
                        ]);

        //Création Jeu de donnée Inflation à chaque nouvel utilisateur
        Inflation::create(['TauxMoyen' => '5.2', 'dateInflation' => '2022-01-01'])->Users()->attach($userid);
        Inflation::create(['TauxMoyen' => '1.6', 'dateInflation' => '2021-01-01'])->Users()->attach($userid);
        Inflation::create(['TauxMoyen' => '0.5', 'dateInflation' => '2020-01-01'])->Users()->attach($userid);
        Inflation::create(['TauxMoyen' => '1.1', 'dateInflation' => '2019-01-01'])->Users()->attach($userid);
        Inflation::create(['TauxMoyen' => '1.8', 'dateInflation' => '2018-01-01'])->Users()->attach($userid);
        Inflation::create(['TauxMoyen' => '1.0', 'dateInflation' => '2017-01-01'])->Users()->attach($userid);
        Inflation::create(['TauxMoyen' => '0.2', 'dateInflation' => '2016-01-01'])->Users()->attach($userid);
        Inflation::create(['TauxMoyen' => '0.0', 'dateInflation' => '2015-01-01'])->Users()->attach($userid);
        Inflation::create(['TauxMoyen' => '0.5', 'dateInflation' => '2014-01-01'])->Users()->attach($userid);
        Inflation::create(['TauxMoyen' => '0.9', 'dateInflation' => '2013-01-01'])->Users()->attach($userid);
        Inflation::create(['TauxMoyen' => '2.0', 'dateInflation' => '2012-01-01'])->Users()->attach($userid);
        Inflation::create(['TauxMoyen' => '2.1', 'dateInflation' => '2011-01-01'])->Users()->attach($userid);
        Inflation::create(['TauxMoyen' => '1.5', 'dateInflation' => '2010-01-01'])->Users()->attach($userid);

        return redirect(RouteServiceProvider::HOME);
    }
}
