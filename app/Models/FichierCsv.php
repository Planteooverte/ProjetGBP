<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichierCsv extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'NomFichier',
        'CheminFichier',
        'created_at',
        'updated_at',
        'deleted_at',
        'user_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function OperationBancaires()
    {
        return $this->hasMany(OperationBancaire::class);
    }
}
