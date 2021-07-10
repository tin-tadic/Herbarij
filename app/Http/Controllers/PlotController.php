<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plot;
use App\Models\Planter;
use Illuminate\Support\Facades\DB;
use Validator;

class PlotController extends Controller
{

    public function getAddPlot() {
        $available_planters = DB::table('planters')->select('id', 'naziv_rasadnika')->get();
        return view('planters-plots.plotAdd', compact('available_planters'));
    }

    public function addPlot(Request $request) {
        
        $rules = [
            'id_rasadnika' => ['exists:planters,id'],
            'naziv_plota' => ['required', 'max:50'],
            'vrsta_plota' => ['required', 'max:50'],

            'broj_sadnica' => ['required', 'integer']
        ];
        $messages = [
            'id_rasadnika.exists' => 'Taj rasadnik ne postoji!' ,
            'naziv_plota.required' => 'Naziv plota je obavezan!',
            'vrsta_plota.required' => 'Vrsta plota je obavezna!',
            'naziv_plota.max' => 'Naziv plota ne može biti dulji od 50 znakova!',
            'vrsta_plota.max' => 'Vrsta plota ne može biti dulja od 50 znakova!',

            'broj_sadnica.integer' => 'Mora biti broj!',
            'broj_sadnica.required' => 'Broj sadnica je obavezan!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
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
            $available_planters = DB::table('planters')->select('id', 'naziv_rasadnika')->get();
            return view('planters-plots.plotEdit', compact('plot', 'available_planters'));
        } else {
            return redirect()->route('home')->with('error', 'Taj plot nije pronađen!');
        }
    }

    public function editPlot(Request $request, $plotId) {
        $rules = [
            'id_rasadnika' => ['exists:planters,id'],
            'naziv_plota' => ['required', 'max:50'],
            'vrsta_plota' => ['required', 'max:50'],

            'broj_sadnica' => ['required', 'integer'],
            'broj_sadnica.required' => 'Broj sadnica je obavezan!'
        ];
        $messages = [
            'id_rasadnika.exists' => 'Taj rasadnik ne postoji!' ,
            'naziv_plota.required' => 'Naziv plota je obavezan!',
            'vrsta_plota.required' => 'Vrsta plota je obavezna!',
            'naziv_plota.max' => 'Naziv plota ne može biti dulji od 50 znakova!',
            'vrsta_plota.max' => 'Vrsta plota ne može biti dulja od 50 znakova!',

            'broj_sadnica.integer' => 'Mora biti broj!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
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
