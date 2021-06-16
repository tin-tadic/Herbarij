<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_plota',
        'id_transakcije',
        'id_biljke',
        'broj_biljaka',
        'datum_sadnje',
        'datum_uklanjanja',
    ];

}
