<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consommation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'DateReleve',
        'ReleveCompteur',
        'domaine_id',
    ];

    //suppression de "create_at" et "update_at"
    public $timestamps = false;

    public function Domaines()
    {
        return $this->belongsTo(Domaine::class);
    }
}
