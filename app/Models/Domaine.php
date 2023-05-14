<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'NomDomaine',
        'Unite',
        'user_id',
    ];

    //suppression de "create_at" et "update_at"
    public $timestamps = false;

    public function Users()
    {
        return $this->belongsTo(User::class);
    }

    public function OperationBancaires()
    {
        return $this->belongsTo(OperationBancaire::class);
    }

    public function Consommations()
    {
        return $this->hasMany(Consommation::class);
    }

    public function RelImpositions()
    {
        return $this->hasMany(RelImposition::class);
    }

    public function FicheDePayes()
    {
        return $this->belongsTo(FicheDePaye::class);
    }

}
