<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planter;
use Illuminate\Support\Facades\DB;
use App\Models\Plot;
use Validator;

class PlanterController extends Controller
{
    public function addPlanter(Request $request) {
        
        $rules = [
            'naziv_rasadnika' => ['required', 'max:50'],
            'vrsta' => ['required', 'max:50'],
            'lokacija' => ['required', 'max:200'],
            'povrsina' => ['required', 'numeric'],
            'komentar' => ['required', 'max:1000'],
            'vrsta_tla' => ['required', 'max: 50']
        ];
        $messages = [
            'naziv_rasadnika.required' => 'Naziv rasadnika je obavezan!',
            'narodna_imena.required' => 'Vrsta rasadnika je obavezna!',
            'lokacija.required' => 'Lokacija rasadnika je obavezna!',
            'komentar.required' => 'Komentar rasadnika je obavezan!',
            'vrsta_tla.required' => 'Vrsta tla je obavezna!',
            'vrsta.required' => 'Vrsta je obavezna!',

            'naziv_rasadnika.max' => 'Naziv rasadnika ne može biti duži od 50 znakova!',
            'narodna_imena.max' => 'Vrsta rasadnika ne može biti duža od 50 znakova!',
            'lokacija.max' => 'Lokacija rasadnika ne može biti duža od 200 znakova!',
            'komentar.max' => 'Komentar rasadnika ne može biti duži od 1000 znakova!',
            'vrsta_tla.max' => 'Vrsta tla ne može biti duža od 50 znakova!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }


        Planter::create([
            'naziv_rasadnika' => $request->input('naziv_rasadnika'),
            'vrsta' => $request->input('vrsta'),
            'lokacija' => $request->input('lokacija'),
            'povrsina' => $request->input('povrsina'),
            'komentar' => $request->input('komentar'),
            'vrsta_tla' => $request->input('vrsta_tla'),
        ]);

        return redirect()->route('home')->with('success', 'Rasadnik uspješno napravljen!');
    }

    public function searchForPlanter(Request $request) {

        if(!is_numeric($request->input('lookForPlanter'))) {
            return redirect()->back()->with('error', 'ID rasadnika mora biti broj!');
        }

        $planterId = $request->input('lookForPlanter');
        if (Planter::find($planterId)) {
            $planter = Planter::find($planterId);
            $plots = Plot::where('id_rasadnika', $planterId)->paginate(3);
            return view('planters-plots.planter', compact('plots', 'planter'));
        } else {
            return redirect()->route('home')->with('error', 'Rasadnik sa tim IDom nije pronađen!');
        }
    }

    public function getPlanter($planterId) {
        if (Plot::where('id_rasadnika', $planterId)->exists()) {
            $plots = Plot::where('id_rasadnika', $planterId)->paginate(3);
            return view('planters-plots.planter')->with('plots', $plots);
        } else {
            return redirect()->route('home')->with('error', 'Rasadnik sa tim IDom nije pronađen!');
        }
    }

    public function getPlanterForEdit($planterId) {
        $planter = Planter::find($planterId);
        if ($planter) {
            return view('planters-plots.planterEdit')->with('planter', $planter);
        } else {
            return redirect()->route('home')->with('error', 'Taj rasadnik nije pronađen!');
        }
    }

    public function editPlanter(Request $request, $planterId) {
        $rules = [
            'naziv_rasadnika' => ['sometimes', 'max:50'],
            'vrsta' => ['sometimes', 'max:50'],
            'lokacija' => ['sometimes', 'max:200'],
            'povrsina' => ['sometimes', 'numeric'],
            'komentar' => ['sometimes', 'max:1000'],
            'vrsta_tla' => ['sometimes', 'max: 50']
        ];
        $messages = [
            'naziv_rasadnika.max' => 'Naziv rasadnika ne može biti duži od 50 znakova!',
            'narodna_imena.max' => 'Vrsta rasadnika ne može biti duža od 50 znakova!',
            'lokacija.max' => 'Lokacija rasadnika ne može biti duža od 200 znakova!',
            'komentar.max' => 'Komentar rasadnika ne može biti duži od 1000 znakova!',
            'vrsta_tla.max' => 'Vrsta tla ne može biti duža od 50 znakova!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }


        if (Planter::find($planterId)->exists()) {
            Planter::find($planterId)
                ->update([
                    'naziv_rasadnika' => $request->input('naziv_rasadnika'),
                    'vrsta' => $request->input('vrsta'),
                    'lokacija' => $request->input('lokacija'),
                    'povrsina' => $request->input('povrsina'),
                    'komentar' => $request->input('komentar'),
                    'vrsta_tla' => $request->input('vrsta_tla'),
                ]);
            }

        return redirect()->route('home')->with('success', 'Rasadnik uspješno napravljen!');
    }

    public function deletePlanter($planterId) {
        try {
            Planter::destroy($planterId);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Rasadnik nije moguće izbrisati!');
        }
    }
}
