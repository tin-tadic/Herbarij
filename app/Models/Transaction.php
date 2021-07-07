<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected promijenuto  u public
    public $fillable = [
        'naziv_rasadnika',
        'vrsta',
        'lokacija',
        'povrsina',
        'komentar',
        'vrsta_tla',
        'artikl',
        'kolicina',
    ];
}
