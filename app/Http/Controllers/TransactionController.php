<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use PDF;
use Validator;


class TransactionController extends Controller
{
    public function addTransaction(Request $request) {
        
        $rules = [
            'id_kupca' => ['required', 'numeric', 'exists:buyers,id'],
            'tip_transakcije' => ['required'],
            'datum' => ['required', 'date'],
            'stanje' => ['required'],
            'cijena' => ['required', 'numeric', 'min:0'],
            'kolicina' => ['required', 'numeric', 'min:0'],
            'artikl' => ['required'],
        ];
        $messages = [
            'id_kupca.required' => "Ovo polje je obavezno!",
            'id_kupca.numeric' => 'ID kupca mora biti broj!',
            'id_kupca.exists' => "Taj kupac ne postoji!",

            'tip_transakcije.required' => "Tip transakcije je obavezan!",

            'datum.required' => "Datum je obavezan!",
            'datum.date' => "Datum mora biti valjan datum!",

            'stanje.required' => "Stanje je obavezno!",

            'cijena.required' => "Cijena je obavezna!",
            'cijena.numeric' => "Cijena mora biti broj!",
            'cijena.min' => "Cijena mora biti veća od 0!",

            'kolicina.required' => "Količina je obavezna!",
            'kolicina.numeric' => "Količina mora biti broj!",
            'kolicina.min' => "Količina mora biti veća od 0!",

            'artikl.required' => "Artikl je obavezan!",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }


        $newTransaction = Transaction::create([
            'id_kupca' => $request->input('id_kupca'),
            'tip_transakcije' => $request->input('tip_transakcije'),
            'datum' => $request->input('datum'),
            'stanje' => $request->input('stanje'),
            'cijena' => $request->input('cijena'),
            'kolicina' => $request->input('kolicina'),
            'artikl' => $request->input('artikl'),
        ]);

        return redirect()->route('viewTransactions')->with('success', 'Transakcija uspješno napravljena!');
    }

    public function getTransactions() {
        $noLinksKupovina = 0;
        $noLinksProdaja = 0;
        $noLinksNabava = 0;
        $kupovine = Transaction::where('tip_transakcije', 1)->paginate(3);
        $transakcije = Transaction::where('tip_transakcije', 2)->paginate(3);
        $nabave = Transaction::where('tip_transakcije', 3)->paginate(3);
        
        return view('transactions.viewTransactions')->with(['kupovine' => $kupovine, 'transakcije' => $transakcije, 'nabave' => $nabave, 'noLinksKupovina' => $noLinksKupovina, 'noLinksProdaja' => $noLinksProdaja, 'noLinksNabava' => $noLinksNabava]);
    }

    public function searchKupovina(Request $request) {
        $noLinksKupovina = 1;
        $noLinksProdaja = 1;
        $noLinksNabava = 1;
        $transakcije = Transaction::where('tip_transakcije', 2)->paginate(3);
        $nabave = Transaction::where('tip_transakcije', 3)->paginate(3);

        $searchBy = $request->input('kupovina_searchBy');
        $orderBy = $request->input('kupovina_orderBy');
        $sortBy = $request->input('kupovina_sortBy');

        if($request->input('searchFor') == '') {
            return redirect()->back()->with('error', 'Morate upisati kritarij za pretragu!');
        }


        if($searchBy == 'kolicina') {
            if(!is_numeric($request->input('searchFor'))) {
                return redirect()->back()->with('error', 'Za pretragu po količini morate upisati broj');
            }

            $kupovine = Transaction::where('tip_transakcije', 1)->where('kolicina', '=', $request->input('searchFor'))->orderBy($orderBy, $sortBy)->get();
        } else if ($searchBy == 'cijena') {

            if(!is_numeric($request->input('searchFor'))) {
                return redirect()->back()->with('error', 'Za pretragu po cijeni morate upisati broj');
            }

            $kupovine = Transaction::where('tip_transakcije', 1)->where('cijena', '=', $request->input('searchFor'))->orderBy($orderBy, $sortBy)->get();
        } else if ($searchBy == 'artikl') {
            $kupovine = Transaction::where('tip_transakcije', 1)->where('artikl', '=', $request->input('searchFor'))->orderBy($orderBy, $sortBy)->get();
        }
        
        return view('transactions.viewTransactions')->with(['kupovine' => $kupovine, 'transakcije' => $transakcije, 'nabave' => $nabave, 'noLinksKupovina' => $noLinksKupovina, 'noLinksProdaja' => $noLinksProdaja, 'noLinksNabava' => $noLinksNabava]);
    }

    public function searchProdaja(Request $request) {
        $noLinksKupovina = 1;
        $noLinksProdaja = 1;
        $noLinksNabava = 1;
        $kupovine = Transaction::where('tip_transakcije', 1)->paginate(3);
        $nabave = Transaction::where('tip_transakcije', 3)->paginate(3);

        $searchBy = $request->input('transakcija_searchBy');
        $orderBy = $request->input('transakcija_orderBy');
        $sortBy = $request->input('transakcija_sortBy');


        if($searchBy == 'kolicina') {
            if(!is_numeric($request->input('searchFor'))) {
                return redirect()->back()->with('error', 'Za pretragu po količini morate upisati broj');
            }

            $transakcije = Transaction::where('tip_transakcije', 2)->where('kolicina', '=', $request->input('searchFor'))->orderBy($orderBy, $sortBy)->get();
        } else if ($searchBy == 'cijena') {
            if(!is_numeric($request->input('searchFor'))) {
                return redirect()->back()->with('error', 'Za pretragu po cijeni morate upisati broj');
            }

            $transakcije = Transaction::where('tip_transakcije', 2)->where('cijena', '=', $request->input('searchFor'))->orderBy($orderBy, $sortBy)->get();
        } else if ($searchBy == 'artikl') {
            $transakcije = Transaction::where('tip_transakcije', 2)->where('artikl', '=', $request->input('searchFor'))->orderBy($orderBy, $sortBy)->get();
        }
        
        return view('transactions.viewTransactions')->with(['kupovine' => $kupovine, 'transakcije' => $transakcije, 'nabave' => $nabave, 'noLinksKupovina' => $noLinksKupovina, 'noLinksProdaja' => $noLinksProdaja, 'noLinksNabava' => $noLinksNabava]);
    }

    public function searchNabava(Request $request) {
        $noLinksKupovina = 1;
        $noLinksProdaja = 1;
        $noLinksNabava = 1;
        $kupovine = Transaction::where('tip_transakcije', 1)->paginate(3);
        $transakcije = Transaction::where('tip_transakcije', 2)->paginate(3);

        $searchBy = $request->input('nabava_searchBy');
        $orderBy = $request->input('nabava_orderBy');
        $sortBy = $request->input('nabava_sortBy');


        if($searchBy == 'kolicina') {
            if(!is_numeric($request->input('searchFor'))) {
                return redirect()->back()->with('error', 'Za pretragu po količini morate upisati broj');
            }

            $nabave = Transaction::where('tip_transakcije', 3)->where('kolicina', '=', $request->input('searchFor'))->orderBy($orderBy, $sortBy)->get();
        } else if ($searchBy == 'cijena') {
            if(!is_numeric($request->input('searchFor'))) {
                return redirect()->back()->with('error', 'Za pretragu po cijeni morate upisati broj');
            }

            $nabave = Transaction::where('tip_transakcije', 3)->where('cijena', '=', $request->input('searchFor'))->orderBy($orderBy, $sortBy)->get();
        } else if ($searchBy == 'artikl') {
            $nabave = Transaction::where('tip_transakcije', 3)->where('artikl', '=', $request->input('searchFor'))->orderBy($orderBy, $sortBy)->get();
        }
        
        return view('transactions.viewTransactions')->with(['kupovine' => $kupovine, 'transakcije' => $transakcije, 'nabave' => $nabave, 'noLinksKupovina' => $noLinksKupovina, 'noLinksProdaja' => $noLinksProdaja, 'noLinksNabava' => $noLinksNabava]);
    }


    public function getTransactionForEdit($transactionId) {
        $transaction = Transaction::find($transactionId);
        if ($transaction) {
            return view('transactions.editTransaction')->with('transaction', $transaction);
        } else {
            return redirect()->route('viewTransactions')->with('error', 'Transakcija nije pronađena!');
        }
    }
    
    public function editTransaction(Request $request, $transactionId) {
        $transaction = Transaction::find($transactionId);
        if ($transaction) {
            $rules = [
                'id_kupca' => ['required', 'exists:buyers,id'],
                'tip_transakcije' => ['required'],
                'datum' => ['required', 'date'],
                'stanje' => ['required'],
                'cijena' => ['required', 'numeric', 'min:0'],
                'kolicina' => ['required', 'numeric', 'min:0'],
                'artikl' => ['required'],
            ];
            $messages = [
                'id_kupca.required' => "Ovo polje je obavezno!",
                'id_kupca.exists' => "Taj kupac ne postoji!",
    
                'tip_transakcije.required' => "Tip transakcije je obavezan!",
    
                'datum.required' => "Datum je obavezan!",
                'datum.date' => "Datum mora biti valjan datum!",
    
                'stanje.required' => "Stanje je obavezno!",
    
                'cijena.required' => "Cijena je obavezna!",
                'cijena.numeric' => "Cijena mora biti broj!",
                'cijena.min' => "Cijena mora biti veća od 0!",
    
                'kolicina.required' => "Količina je obavezna!",
                'kolicina.numeric' => "Količina mora biti broj!",
                'kolicina.min' => "Količina mora biti veća od 0!",
    
                'artikl.required' => "Artikl je obavezan!",
            ];
    
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
    
    
            Transaction::find($transactionId)
                ->update([
                    'id_kupca' => $request->input('id_kupca'),
                    'tip_transakcije' => $request->input('tip_transakcije'),
                    'datum' => $request->input('datum'),
                    'stanje' => $request->input('stanje'),
                    'cijena' => $request->input('cijena'),
                    'kolicina' => $request->input('kolicina'),
                    'artikl' => $request->input('artikl'),
                ]);
    
            return redirect()->route('viewTransactions')->with('success', 'Promjene uspješno spremljene!');
        } else {
            return redirect()->route('viewTransactions')->with('error', 'Transakcija nije pronađena!');
        }
    }

    public function deleteTransaction($transactionId) {
        try {
            Transaction::destroy($transactionId);
            return redirect()->route('viewTransactions')->with('success', 'Transakcija uspješno izbrisana!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Transakcija se ne može izbrisati!');
        }
    }

    public function getAllTransaction(){
        $transactions = Transaction::all();

        foreach ($transactions as $transaction) {
            $transaction->cijena = round($transaction->cijena, 2);
        }

        return view ('transaction', compact ('transactions'));
    
    }
    public function downloadPDF(){
        $transactions = Transaction::all();
        foreach ($transactions as $transaction) {
            $transaction->cijena = round($transaction->cijena, 2);
        }
        
        $pdf = PDF::loadView('transaction' , compact('transactions'));
        return $pdf->download('izvjestaj_transakcija.pdf');
    }

}
