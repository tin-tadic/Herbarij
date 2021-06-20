<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planter;
use Illuminate\Support\Facades\DB;

class PlanterController extends Controller
{
    public function addPlanter(Request $request) {
        
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
            dd($validator);
            return redirect()->back()->withInput()->withErrors($validator);
        }


        $newPlanter = Planter::create([
            'naziv_rasadnika' => $request->input('naziv_rasadnika'),
            'vrsta' => $request->input('vrsta'),
            'lokacija' => $request->input('lokacija'),
            'povrsina' => $request->input('povrsina'),
            'komentar' => $request->input('komentar'),
            'vrsta_tla' => $request->input('vrsta_tla'),
        ]);

        // return redirect()->route('ADD A ROUTE', ['idRasadnika' => $newPlanter->id])->with('success', 'Rasadnik uspješno napravljen.');
        return redirect()->route('home');
    }

    public function getPlanter($planterId) {
        $planter = Planter::find($planterId);
        if ($planter) {
            dd($planter);
            return view('planters.viewPlanter')->with('planter', $planter);
        } else {
            dd("TODO::Rasadnik ne postoji!");
        }
    }

    public function deletePlanter($planterId) {
        try {
            Planter::destroy($planterId);
        } catch (\Illuminate\Database\QueryException $e) {
            //TODO::Redirect back with message saying it cannot be deleted because of an FK constraint
            dd($e);
        }
    }
}
