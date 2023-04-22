<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelImposition extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'TypeImposition',
        'AnneeFiscal',
        'Montant',
        'DateEtablissement',
        'TauxImposition',
        'RevenuFiscalDeReference',
        'NbrDePart',
        'domaine_id',
        'profil_imposition_id',
    ];
    
    //suppression de "create_at" et "update_at"
    public $timestamps = false;

    public function Domaines()
    { 
        return $this->belongsTo(Domaine::class); 
    }

    public function ProfilImpositions()
    { 
        return $this->belongsTo(ProfilImposition::class); 
    }
}
