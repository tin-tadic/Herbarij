<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plot;
use Illuminate\Support\Facades\DB;
use Validator;

class PlotController extends Controller
{
    public function addPlot(Request $request) {
        
        $rules = [
            'id_rasadnika' => ['exists:planters,id'],
            'naziv_plota' => ['sometimes', 'max:50'],
            'vrsta_plota' => ['sometimes', 'max:50'],

            'trenutno_posadjeno' => ['sometimes', 'exists:plantings,id', 'integer'],
            'prethodno_posadjeno' => ['sometimes', 'exists:plantings,id', 'integer'],
            'buduce_posadjeno' => ['sometimes', 'exists:plantings,id', 'integer'],
            'broj_sadnica' => ['sometimes', 'integer']
        ];
        $messages = [
            'id_rasadnika.exists' => 'Taj rasadnik ne postoji!' ,
            'naziv_plota.max' => 'Naziv plota ne može biti dulji od 50 znakova!',
            'vrsta_plota.max' => 'Vrsta plota ne može biti dulja od 50 znakova!',

            'trenutno_posadjeno.exists' => 'Mora biti prazno ili mora postojati unutar arhive sađenja!',
            'prethodno_posadjeno.exists' => 'Mora biti prazno ili mora postojati unutar arhive sađenja!',
            'buduce_posadjeno.exists' => 'Mora biti prazno ili mora postojati unutar arhive sađenja!',
            'broj_sadnica.integer' => 'Mora biti broj!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            dd($validator);
            return redirect()->back()->withInput()->withErrors($validator);
        }


        $newPlot = Plot::create([
            'id_rasadnika' => $request->input('id_rasadnika'),
            'naziv_plota' => $request->input('naziv_plota'),
            'vrsta_plota' => $request->input('vrsta_plota'),

            'trenutno_posadjeno' => $request->input('trenutno_posadjeno'),
            'prethodno_posadjeno' => $request->input('prethodno_posadjeno'),
            'buduce_posadjeno' => $request->input('buduce_posadjeno'),
            'broj_sadnica' => $request->input('broj_sadnica'),
        ]);

        return redirect()->route('home')->with('success', 'Plot uspješno napravljen.');
    }

    public function getPlot($plotId) {
        $plot = Plot::find($plotId);
        if ($plot) {
            dd($plot);
            return view('plots.viewPlot')->with('plot', $plot);
        } else {
            dd("TODO::Plot ne postoji!");
        }
    }

    public function deletePlot($plotId) {
        try {
            Plot::destroy($plotId);
            return redirect()->back()->with('success', 'Plot uspješno obrisan!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Plot nije moguće obrisati jer se koristi!');
        }
    }

    public function getPlotForEdit($plotId) {
        $plot = Plot::find($plotId);
        if ($plot) {
            return view('planters-plots.plotEdit')->with('plot', $plot);
        } else {
            return redirect()->route('home')->with('error', 'Taj plot nije pronađen!');
        }
    }

    public function editPlot(Request $request, $plotId) {
        $rules = [
            'id_rasadnika' => ['exists:planters,id'],
            'naziv_plota' => ['sometimes', 'max:50'],
            'vrsta_plota' => ['sometimes', 'max:50'],

            'trenutno_posadjeno' => ['sometimes', 'exists:plantings,id', 'integer'],
            'prethodno_posadjeno' => ['sometimes', 'exists:plantings,id', 'integer'],
            'buduce_posadjeno' => ['sometimes', 'exists:plantings,id', 'integer'],
            'broj_sadnica' => ['sometimes', 'integer']
        ];
        $messages = [
            'id_rasadnika.exists' => 'Taj rasadnik ne postoji!' ,
            'naziv_plota.max' => 'Naziv plota ne može biti dulji od 50 znakova!',
            'vrsta_plota.max' => 'Vrsta plota ne može biti dulja od 50 znakova!',

            'trenutno_posadjeno.exists' => 'Mora biti prazno ili mora postojati unutar arhive sađenja!',
            'prethodno_posadjeno.exists' => 'Mora biti prazno ili mora postojati unutar arhive sađenja!',
            'buduce_posadjeno.exists' => 'Mora biti prazno ili mora postojati unutar arhive sađenja!',
            'broj_sadnica.integer' => 'Mora biti broj!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            dd($validator);
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if (Plot::find($plotId)->exists()) {
            Plot::find($plotId)
                ->update([
                    'id_rasadnika' => $request->input('id_rasadnika'),
                    'naziv_plota' => $request->input('naziv_plota'),
                    'vrsta_plota' => $request->input('vrsta_plota'),

                    'trenutno_posadjeno' => $request->input('trenutno_posadjeno'),
                    'prethodno_posadjeno' => $request->input('prethodno_posadjeno'),
                    'buduce_posadjeno' => $request->input('buduce_posadjeno'),
                    'broj_sadnica' => $request->input('broj_sadnica'),
                ]);
            
            return redirect()->route('home')->with('success', 'Promjene uspješno spremljene!');
        } else {
            return redirect()->route('home')->with('error', 'Došlo je do greške. Promjene nisu spremljene.');
        }
    }

}
