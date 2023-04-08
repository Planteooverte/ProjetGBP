<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationBancaire extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'DateOperation',
        'DescriptionOperation',
        'Credit',
        'Debit',
        'idCompte',
        'idDomaine',
    ];

    //suppression de "create_at" et "update_at"
      public $timestamps = false;
}
