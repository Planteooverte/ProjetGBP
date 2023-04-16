<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'NomEntreprise',
        'Adresse',
    ];

    //suppression de "create_at" et "update_at"
      public $timestamps = false;

    public function Users()
    { 
        return $this->belongsTo(User::class); 
    }

    public function FicheDePayes()
    { 
        return $this->hasMany(FicheDePaye::class); 
    }

}
