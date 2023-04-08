<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debiter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idOperation',
        'idDomaine',
        'idImpot',
        'TypeD',
    ];

    //suppression de "create_at" et "update_at"
      public $timestamps = false;
}
