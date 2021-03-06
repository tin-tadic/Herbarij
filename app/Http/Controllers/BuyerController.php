<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;
use Illuminate\Support\Facades\DB;
use Validator;

class BuyerController extends Controller
{

    public function getBuyers() {
        $buyers = Buyer::paginate(4);
        return view('customers.customers')->with('buyers', $buyers);
    }

    public function addBuyer(Request $request) {
        
        $rules = [
            'ime' => ['required', 'max: 50'],
            'adresa' => ['required', 'max:200'],
            'tip' => ['required', 'max:50'],
        ];
        $messages = [
            'ime.required' => "Ime je obavezno!",
            'adresa.required' => "Adresa je obavezna!",
            'tip.required' => "Tip je obavezan!",

            'ime.max' => "Ime ne može biti dulje od 50 znakova!",
            'adresa.max' => "Adresa ne može biti dulja od 200 znakova!",
            'tip.max' => "Tip ne može biti dulji od 50 znakova!",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $newBuyer = Buyer::create([
            'ime' => $request->input('ime'),
            'adresa' => $request->input('adresa'),
            'tip' => $request->input('tip'),
        ]);

        return redirect()->route('getBuyers')->with('success', 'Kupac uspješno spremljen!');
    }


    public function getBuyerForEdit($buyerId) {
        $buyer = Buyer::find($buyerId);
        if ($buyer) {
            return view('customers.editCustomer')->with('buyer', $buyer);
        } else {
            return redirect()->route('getBuyers')->with('error', 'Taj kupac nije pronađena!');
        }
    }

    public function editBuyer(Request $request, $buyerId) {
        $rules = [
            'ime' => ['required', 'max: 50'],
            'adresa' => ['required', 'max:200'],
            'tip' => ['required', 'max:50'],
        ];
        $messages = [
            'ime.required' => "Ime je obavezno!",
            'adresa.required' => "Adresa je obavezna!",
            'tip.required' => "Tip je obavezan!",

            'ime.max' => "Ime ne može biti dulje od 50 znakova!",
            'adresa.max' => "Adresa ne može biti dulja od 200 znakova!",
            'tip.max' => "Tip ne može biti dulji od 50 znakova!",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if (Buyer::find($buyerId)->exists()) {
            Buyer::find($buyerId)
                ->update([
                    'ime' => $request->input('ime'),
                    'adresa' => $request->input('adresa'),
                    'tip' => $request->input('tip'),
                ]);
            
            return redirect()->route('getBuyers')->with('success', 'Projmene uspješno spremljene.');
        } else {
            return redirect()->route('home')->with('error', 'Došlo je do greške. Promjene nisu spremljene.');
        }
    }

    public function deleteBuyer($buyerId) {
        try {
            Buyer::destroy($buyerId);
            return redirect()->route('getBuyers')->with('success', 'Kupac uspješno izbrisan!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Kupca nije moguće izbrisati!');
        }
    }
}
