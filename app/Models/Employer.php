<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Employer extends Pivot
{
    // protected $table = 'entreprise_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'entreprise_id',
    ];

    // public function User()
    // {
    //     return $this->belongTo(User::class);
    // }

    // public function Entreprise()
    // {
    //     return $this->belongTo(Entreprise::class);
    // }

    // public function FicheDePayes()
    // {
    //     return $this->hasManyThrought(FicheDePaye::class,Entreprise::class );
    // }
}
