<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model; //Utilisation belongsTo/belongsToMany ...

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
        return $this->belongsToMany(Entreprise::class)
                                ->withPivot('dateEntree', 'dateSortie');;
    }

    public function Inflations()
    {
        return $this->belongsToMany(Inflation::class);
    }
}
