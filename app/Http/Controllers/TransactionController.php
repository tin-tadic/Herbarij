<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function addTransaction(Request $request) {
        
        $rules = [
            'id_kupca' => ['quired', 'exists:buyers'],
            'tip_transakcije' => ['required', 'max:50'],
            'komentar' => ['required', 'max:1000'],
            'datum' => ['required', 'date'],
            'stanje' => ['required', 'numeric'],
            'cijena' => ['required', 'numeric'],
        ];
        $messages = [
            'id_kupca.required' => "Ovo polje je obavezno!",
            'id_kupca.exists' => "Taj kupac ne postoji!",
            'tip_transakcije.required' => "Tip transakcije je obavezan!",
            'tip_transakcije.max' => "Tip transakcije ne može biti duži od 50 znakova!",
            'komentar.required' => "Komentar je obavezan!",
            'komentar.max' => "Komentar ne može biti duži od 1000 znakova!",
            'datum.required' => "Datum je obavezan!",
            'datum.date' => "Datum mora biti valjan datum!",
            'stanje.required' => "Stanje je obavezno!",
            'stanje.numeric' => "Stanje mora biti broj!",
            'cijena.required' => "Cijena je obavezna!",
            'cijena.numeric' => "Cijena mora biti broj!",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            dd($validator);
            return redirect()->back()->withInput()->withErrors($validator);
        }


        $newTransaction = Transaction::create([
            'id_kupca' => $request->input('id_kupca'),
            'tip_transakcije' => $request->input('tip_transakcije'),
            'komentar' => $request->input('komentar'),
            'datum' => $request->input('datum'),
            'stanje' => $request->input('stanje'),
            'cijena' => $request->input('cijena'),
        ]);

        // return redirect()->route('ADD A ROUTE', ['idRasadnika' => $newTransaction->id])->with('success', 'Rasadnik uspješno napravljen.');
        return redirect()->route('home');
    }

    public function getTransactions() {
        $transactions = Transaction::paginate(4);
        return view('transactions.viewTransactions')->with('transactions', $transactions);
    }

    public function getTransaction($transactionId) {
        $transaction = Transaction::find($transactionId);
        if ($transaction) {
            dd($transaction);
            return view('transactions.viewTransaction')->with('transaction', $transaction);
        } else {
            dd("TODO::Transaction ne postoji!");
        }
    }

    public function deleteTransaction($transactionId) {
        try {
            Transaction::destroy($transactionId);
        } catch (\Illuminate\Database\QueryException $e) {
            //TODO::Redirect back with message saying it cannot be deleted because of an FK constraint
            dd($e);
        }
    }
}
