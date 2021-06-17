<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Str;

class PlantController extends Controller
{

    public function addPlant(Request $request) {

        $rules = [
            'naziv' => ['required'],
            'narodna_imena' => ['sometimes', 'max:200'],
            'tip_tla' => ['required'],

            'jestivost_ljudi' => ['required'],
            'jestivost_zivotinje' => ['required'],
            'ljekovitost' => ['required'],
            'gnjojivo' => ['required'],
            'otrovno' => ['required'],
            'gorivo' => ['required'],
            'sirovina' => ['required'],

            'vrijeme_sadnje' => ['sometimes', 'date'],
            'vrijeme_zetve' => ['sometimes', 'date'],
            'vrijeme_orezivanja' => ['sometimes', 'date'],

            'komentar' => ['sometimes', 'max:1000'],
            'opis' => ['sometimes', 'max:200'],
            'slika' => ['sometimes', 'mimes:jpeg,jpg,png,bmp'],
            'trenutna_cijena' => ['sometimes', 'numeric'],
        ];
        $messages = [
            'naziv.required' => 'Obavezno je unijeti latinski naziv biljke!',
            'narodna_imena.max' => 'Narodna imena ne smiju biti duža od 200 znakova!',
            'tip_tla.required' => 'Obavezno je odabrati tip tla!',

            'jestivost_ljudi.required' => 'Obavezno je ustanoviti sve gore navedene atribute!',
            'jestivost_zivotinje.required' => 'Obavezno je ustanoviti sve gore navedene atribute!',
            'ljekovitost.required' => 'Obavezno je ustanoviti sve gore navedene atribute!',
            'gnjojivo.required' => 'Obavezno je ustanoviti sve gore navedene atribute!',
            'otrovno.required' => 'Obavezno je ustanoviti sve gore navedene atribute!',
            'gorivo.required' => 'Obavezno je ustanoviti sve gore navedene atribute!',
            'sirovina.required' => 'Obavezno je ustanoviti sve gore navedene atribute!',

            'vrijeme_sadnje.date' => 'Vrijeme sadnje mora biti valjan datum!',
            'vrijeme_zetve.date' => 'Vrijeme žetve mora biti valjan datum!',
            'vrijeme_orezivanja.date' => 'Vrijeme orezivanja mora biti valjan datum!',
            
            'komentar.max' => 'Komentar ne može biti dulji od 1000 znakova!',
            'opis.max' => 'Opis ne može biti dulji od 200 znakova!',
            'slika.mimes' => 'Format slike nije podržan! Podržani formati: .bmp .jpg .png .jpeg',
            'trenutna_cijena.numeric' => 'Trenutna cijena mora biti broj! Probajte koristiti točku umjesto zareza.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            dd($validator);
            return redirect()->back()->withInput()->withErrors($validator);
        }

        
        $name = Str::random(15) . $request->slika->getClientOriginalName();
        $request->slika->storeAs('plantPictures', $name, 'public');

        $newPlant = Plant::create([
            'naziv' => $request->input('naziv'),
            'narodna_imena' => $request->input('narodna_imena'),
            'tip_tla' => $request->input('tip_tla'),

            'jestivost_ljudi' => $request->input('jestivost_ljudi'),
            'jestivost_zivotinje' => $request->input('jestivost_zivotinje'),
            'ljekovitost' => $request->input('ljekovitost'),
            'gnjojivo' => $request->input('gnjojivo'),
            'otrovno' => $request->input('otrovno'),
            'gorivo' => $request->input('gorivo'),
            'sirovina' => $request->input('sirovina'),

            'vrijeme_sadnje' => $request->input('vrijeme_sadnje'),
            'vrijeme_zetve' => $request->input('vrijeme_zetve'),
            'vrijeme_orezivanja' => $request->input('vrijeme_orezivanja'),

            'komentar' => $request->input('komentar'),
            'opis' => $request->input('opis'),
            'slika' => $name,
            'trenutna_cijena' => $request->input('trenutna_cijena'),
            'kolicina_cijene' => $request->input('kolicina_cijene'),
        ]);

        // return redirect()->route('ADD A ROUTE', ['idBiljke' => $newPlant->id])->with('success', 'Biljka uspješno napravljena.');
        return redirect()->route('home');
    }

    public function getPlant($plantId) {
        $plant = Plant::find($plantId);
        if ($plant) {

            //Transform booleans into Y/N for frontend
            if($plant->jestivost_ljudi) {
                $plant->jestivost_ljudi = "Da";
            } else {
                $plant->jestivost_ljudi = "Ne";
            }
            if($plant->jestivost_zivotinje) {
                $plant->jestivost_zivotinje = "Da";
            } else {
                $plant->jestivost_zivotinje = "Ne";
            }
            if($plant->ljekovitost) {
                $plant->ljekovitost = "Da";
            } else {
                $plant->ljekovitost = "Ne";
            }
            if($plant->gnjojivo) {
                $plant->gnjojivo = "Da";
            } else {
                $plant->gnjojivo = "Ne";
            }
            if($plant->otrovno) {
                $plant->otrovno = "Da";
            } else {
                $plant->otrovno = "Ne";
            }
            if($plant->gorivo) {
                $plant->gorivo = "Da";
            } else {
                $plant->gorivo = "Ne";
            }
            if($plant->sirovina) {
                $plant->sirovina = "Da";
            } else {
                $plant->sirovina = "Ne";
            }
            
            
            return view('plants.viewPlant')->with('plant', $plant);
        } else {
            dd("TODO::Biljka ne postoji!");
        }
        
    }


    public function deletePlant($plantId) {
        try {
            Plant::destroy($plantId);
        } catch(\Illuminate\Database\QueryException $e) {
            //TODO::Redirect back with message saying it cannot be deleted because of an FK constraint
            dd($e);
        }
    }

}
