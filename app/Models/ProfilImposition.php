<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilImposition extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'NumeroFiscal',
        'user_id',
    ];

    //suppression de "create_at" et "update_at"
    public $timestamps = false;

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function RelImpositions()
    {
        return $this->hasMany(RelImposition::class);
    }
}
