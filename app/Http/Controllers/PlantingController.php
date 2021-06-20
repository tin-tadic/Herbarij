<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planting;
use Illuminate\Support\Facades\DB;

class PlantingController extends Controller
{
    public function addPlanting(Request $request) {
        
        $rules = [
            'id_plota' => ['required', 'exists:plots'],
            'id_transakcije' => ['required', 'exists:transactions'],
            'id_biljke' => ['required', 'exists:plants'],
            'broj_biljaka' => ['required', 'numeric'],
            'datum_sadnje' => ['required', 'date'],
            'datum_uklanjanja' => ['required', 'date'],
        ];
        $messages = [
            'id_plota.required' => 'Obavezno je odabrati plot!',
            'id_plota.exists' => 'Taj plot ne postoji!',
            'id_transakcije.required' => 'Obavezno je pridružiti transakciju!',
            'id_transakcije.exists' => 'Ta transakcija ne postoji!',
            'id_biljke.required' => 'Obavezno je specificirati koje je biljka posađena!',
            'id_biljke.exists' => 'Ta biljka ne postoji!',
            'broj_biljaka.required' => 'Obavezno je specificirati koja biljaka je posađena!',
            'broj_biljaka.numeric' => 'Obavezno je specificirati koliko biljaka je posađeno!',

            'datum_sadnje.required' => 'Datum sadnje je obavezan!',
            'datum_sadnje.date' => 'Datum sadnje mora biti ispravan datum!',
            'datum_uklanjanja.required' => 'Datum uklanjanja je obavezan!',
            'datum_uklanjanja.date' => 'Datum uklanjanja mora biti ispravan datum!',
        ];


        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            dd($validator);
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $newPlanting = Planting::create([
            'id_plota' => $request->input('id_plota'),
            'id_transakcije' => $request->input('id_transakcije'),
            'id_biljke' => $request->input('id_biljke'),
            'broj_biljaka' => $request->input('broj_biljaka'),
            'datum_sadnje' => $request->input('datum_sadnje'),
            'datum_uklanjanja' => $request->input('datum_uklanjanja'),
        ]);

        // return redirect()->route('ADD A ROUTE', ['idRasadnika' => $newPlanting->id])->with('success', 'Rasadnik uspješno napravljen.');
        return redirect()->route('home');
    }

    public function getPlanting($plantingId) {
        $planting = Planting::find($plantingId);
        if ($planting) {
            dd($planting);
            return view('plantings.viewPlanting')->with('planting', $planting);
        } else {
            dd("TODO::Planting ne postoji!");
        }
    }

    public function deletePlanting($plantingId) {
        try {
            Planting::destroy($plantingId);
        } catch (\Illuminate\Database\QueryException $e) {
            //TODO::Redirect back with message saying it cannot be deleted because of an FK constraint
            dd($e);
        }
    }
}
