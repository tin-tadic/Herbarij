<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;
use Illuminate\Support\Facades\DB;

class BuyerController extends Controller
{
    public function addBuyer(Request $request) {
        
        $rules = [
            'ime' => ['sometimes', 'max: 50'],
            'adresa' => ['sometimes', 'max:200'],
            'tip' => ['sometimes', 'max:50'],
        ];
        $messages = [
            'ime.max' => "Ime ne može biti dulje od 50 znakova!",
            'adresa.max' => "Adresa ne može biti dulja od 200 znakova!",
            'tip.max' => "Tip ne može biti dulji od 50 znakova!",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            dd($validator);
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $newBuyer = Buyer::create([
            'ime' => $request->input('ime'),
            'adresa' => $request->input('adresa'),
            'tip' => $request->input('tip'),
        ]);

        // return redirect()->route('ADD A ROUTE', ['idRasadnika' => $newPlanter->id])->with('success', 'Rasadnik uspješno napravljen.');
        return redirect()->route('home');
    }


    public function getBuyer($buyerId) {
        $buyer = Buyer::find($buyerId);
        if ($buyer) {
            dd($buyer);
            return view('buyers.viewBuyer')->with('buyer', $buyer);
        } else {
            dd("TODO::Kupac ne postoji!");
        }
    }

    public function deleteBuyer($buyerId) {
        try {
            Buyer::destroy($buyerId);
        } catch (\Illuminate\Database\QueryException $e) {
            //TODO::Redirect back with message saying it cannot be deleted because of an FK constraint
            dd($e);
        }
    }
}
