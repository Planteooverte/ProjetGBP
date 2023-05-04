<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Inflation extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'Annee',
        'user_id',
        'inflation_id',
    ];

    //suppression de "create_at" et "update_at"
    public $timestamps = false;
    
}
