<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_rasadnika',
        'naziv_plota',
        'vrsta_plota',
        'trenutno_posadjeno',
        'prethodno_posadjeno',
        'buduce_posadjeno',
    ];

}
