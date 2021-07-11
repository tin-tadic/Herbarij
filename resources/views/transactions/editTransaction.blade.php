@extends('app')

@section('pageTitle', 'Edit transakcije')

@section('content')
<section class="section">
<div class="container">
    <h1 id="naslov">Edit transakcije</h1>
    <div id="artikl">
        <form class="contact-form" action="/editTransaction/{{ $transaction->id }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="label" for="id_kupca">
                <span class="left">ID kupca:</span>
                <input class="input is-success" id="id_kupca" name="id_kupca" type="text" placeholder="Naziv artikla" value="{{ $transaction->id_kupca }}" />
               
                @if ($errors->has('id_kupca'))
                <p class="plant">{{ $errors->first('id_kupca') }}</p>
                @endif
            </label>

            <label class="label" for="naz-artikla">
                <span class="left">Naziv artikla:</span>
                <input class="input is-success" id="naz-artikla" name="artikl" type="text" placeholder="Naziv artikla" value="{{ $transaction->artikl }}" />
           
               
                @if ($errors->has('artikl'))
                <p class="plant">{{ $errors->first('artikl') }}</p>
                @endif
            </label>

            <label for="tip_transakcije">Tip transakcije:
                <select id="tip_transakcije" name="tip_transakcije">
                    <option value="1" {{ ($transaction->tip_transakcije=="1")? "selected" : "" }}>Kupovina</option>
                    <option value="2" {{ ($transaction->tip_transakcije=="2")? "selected" : "" }}>Prodaja</option>
                    <option value="3" {{ ($transaction->tip_transakcije=="3")? "selected" : "" }}>Plan nabave</option>
                </select>
            </label>

            <label class="label" for="datum-transakc">
                <span class="left">Datum transakcije:</span> {{ $transaction->datum }}
                <input class="input is-success" id="datum-transakc" name="datum" type="date" placeholder="Datum transakcije" value="{{ $transaction->datum }}" />
              
                @if ($errors->has('datum'))
                <p class="plant">{{ $errors->first('datum') }}</p>
                @endif
          
            </label>
            <label class="label" for="kolicina">
                <span class="left">Količina proizvoda:</span>
                <input class="input is-success" id="kolicina" name="kolicina" type="number" placeholder="Kolicina" value="{{ $transaction->kolicina }}" />
               
                @if ($errors->has('kolicina'))
                <p class="plant">{{ $errors->first('kolicina') }}</p>
                @endif
           
            </label>
            <label class="label" for="cijena">
                <span class="left">Cijena proizvoda:</span>
                <input class="input is-success" id="price" name="cijena" type="text" placeholder="Cijena artikla" value="{{ round($transaction->cijena, 2) }}" />
                
                @if ($errors->has('cijena'))
                <p class="plant">{{ $errors->first('cijena') }}</p>
                @endif
            </label>

            <label for="stanje">Status transakcije: {{ $transaction->stanje }}
                <select id="stanje" name="stanje">
                    <option value="Naruceno" {{ ($transaction->stanje=="Naruceno")? "selected" : "" }}>Naručeno</option>
                    <option value="Gotovo" {{ ($transaction->stanje=="Gotovo")? "selected" : "" }}>Gotovo</option>
                    <option value="Otkazano" {{ ($transaction->stanje=="Otkazano")? "selected" : "" }}>Otkazano</option>
                </select>
            </label>

            <input type="submit" class="button is-large is-fullwidth is-focus is-success is-outlined" value="Submit">
        </form>
    </div>
</div>
</section>

<style scoped>
    .container{
        margin-top:100px;
        width:60%;
    }
    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        
        margin: 0 auto 100px;
        padding: 45px;
        text-align: left;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    .button{
        margin-top: 20px;
    }
    .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
    }
    .form .message a {
        color: #40826d;
        text-decoration: none;
    }
    .form .register-form {
        display: none;
    }
    #naslov{
        font-weight:bold;
        font-size: 30px;
        text-align: center;
        margin-bottom:20px;
    }
</style>

@endsection