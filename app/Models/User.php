<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Retour les plusieurs comptebancaire d'un utilisateur
    public function FichiersCsv()
    {
        return $this->hasMany(FichierCsv::class);
    }

    public function CompteBancaires()
    {
        return $this->hasMany(CompteBancaire::class);
    }

    public function Domaines()
    {
        return $this->hasMany(Domaine::class);
    }

    public function ProfilImpositions()
    {
        return $this->hasMany(ProfilImposition::class);
    }

    public function Entreprises()
    {
        return $this->belongsToMany(Entreprise::class, Employer::class);
    }

    public function Inflations()
    {
        return $this->belongsToMany(Inflation::class);
    }

    public function FicheDePayes()
    {
        return $this->hasManyThrough(   FicheDePaye::class, //Table cible
                                        Employer::class,    //Table pivot
                                        'user_id',          //id table pivot en lien avec la table de départ : User
                                        'entreprise_id',    //id foreign key table cible
                                        'id',               //id de la table départ
                                        'entreprise_id'     //id table pivot en lien avec la table cible
        );
    }

    public function Consommations()
    {
        return $this->hasManyThrough(   Consommation::class,
                                        Domaine::class,
                                        'user_id',
                                        'domaine_id',
                                        'id',
                                        'id'
        );
    }

}
