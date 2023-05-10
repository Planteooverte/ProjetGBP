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
        'QuantiteConsommee',
        'created_at',
        'updated_at',
        'domaine_id',
    ];

    public function Domaines()
    { 
        return $this->belongsTo(Domaine::class); 
    }
}
