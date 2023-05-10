<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; //Utilisation belongsTo/belongsToMany ...
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'dateEntree',
        'dateSortie',
    ];

    //suppression de "create_at" et "update_at"
      public $timestamps = false;

    public function Users()
    {
        return $this->belongsToMany(User::class);
    }

    public function FicheDePayes()
    {
        return $this->hasMany(FicheDePaye::class);
    }

}
