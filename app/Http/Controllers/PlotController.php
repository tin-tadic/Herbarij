<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plot;
use Illuminate\Support\Facades\DB;

class PlotController extends Controller
{
    public function addPlot(Request $request) {
        
        $rules = [
            'id_rasadnika' => ['exists:planters'],
            'naziv_plota' => ['sometimes', 'max:50'],
            'vrsta_plota' => ['sometimes', 'max:50'],

            'trenutno_posadjeno' => ['sometimes', 'exists:plantings'],
            'prethodno_posadjeno' => ['sometimes', 'exists:plantings'],
            'buduce_posadjeno' => ['sometimes', 'exists:plantings'],
        ];
        $messages = [
            'id_rasadnika.exists' => 'Taj rasadnik ne postoji!' ,
            'naziv_plota.max' => 'Naziv plota ne može biti dulji od 50 znakova!',
            'vrsta_plota.max' => 'Vrsta plota ne može biti dulja od 50 znakova!',

            'trenutno_posadjeno.exists' => 'Mora biti prazno ili mora postojati unutar arhive sađenja!',
            'prethodno_posadjeno.exists' => 'Mora biti prazno ili mora postojati unutar arhive sađenja!',
            'buduce_posadjeno.exists' => 'Mora biti prazno ili mora postojati unutar arhive sađenja!',
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
        ]);

        // return redirect()->route('ADD A ROUTE', ['idRasadnika' => $newPlot->id])->with('success', 'Rasadnik uspješno napravljen.');
        return redirect()->route('home');
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
        } catch (\Illuminate\Database\QueryException $e) {
            //TODO::Redirect back with message saying it cannot be deleted because of an FK constraint
            dd($e);
        }
    }
}
