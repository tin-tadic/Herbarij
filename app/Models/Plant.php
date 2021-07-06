<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'naziv',
        'narodna_imena',
        'tip_tla',

        'jestivost_ljudi',
        'jestivost_zivotinje',
        'ljekovitost',
        'gnjojivo',
        'otrovno',
        'gorivo',
        'sirovina',

        'vrijeme_sadnje',
        'vrijeme_zetve',
        'vrijeme_orezivanja',

        'komentar',
        'opis',
        'slika',
        'trenutna_cijena',
        'kolicina_cijene',

        'sorta',
        'kategorija',
        'naziv_dobavljaca',
    ];

}
