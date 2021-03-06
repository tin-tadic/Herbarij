@extends('app')

@section('pageTitle', 'Uredi plot')

@section('content')

<div id="artikl" class="container">
    <div class="form">
        <form class="contact-form" action="/editPlot/{{ $plot->id }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="label" for="id_rasadnika">
                ID rasadnika:
                <select id="id_rasadnika" name="id_rasadnika">
                    @foreach($available_planters as $planter)
                        <option {{ ($planter->id==$plot->id_rasadnika)? "selected" : "" }} value="{{ $planter->id }}" >{{ $planter->id }} - {{ $planter->naziv_rasadnika }}</option>
                    @endforeach
                </select>

                @if ($errors->has('id_rasadnika'))
                    <p class="plant">{{ $errors->first('id_rasadnika') }}</p>
                @endif

            </label>

            <label class="label" for="naziv_rasadnika">
                <span class="left">Naziv plota:</span>
                <input class="input is-success" id="naziv_rasadnika" type="text" placeholder="Naziv plota" name="naziv_plota" value="{{ $plot->naziv_plota }}" />
                
                @if ($errors->has('naziv_plota'))
                    <p class="plant">{{ $errors->first('naziv_plota') }}</p>
                @endif
            
            </label>

            <label class="label" for="lokacija">
                <span class="left">Vrsta plota:</span>
                <input class="input is-success" id="lokacija" type="text" placeholder="Vrsta plota" name="vrsta_plota" value="{{ $plot->vrsta_plota }}" />
               
                @if ($errors->has('vrsta_plota'))
                <p class="plant">{{ $errors->first('vsrta_plota') }}</p>
                @endif
           
            </label>


            <label class="label" for="broj_sadnica">
                <span class="left">Broj sadnica:</span>
                <input class="input is-success" id="broj_sadnica" type="number" placeholder="Broj sadnica" name="broj_sadnica" value="{{ $plot->broj_sadnica }}" />
            
                
                @if ($errors->has('broj_sadnica'))
                <p class="plant">{{ $errors->first('broj_sadnica') }}</p>
                @endif
            </label>

            </label>

            <label class="label" for="trenutno_posadeno">
                Trenutno Posa??eno:
                <input class="input is-success" id="trenutno_posadeno" type="text" placeholder="Trenutno Posadeno" name="trenutno_posadjeno" value="{{ $plot->trenutno_posadjeno }}" />

                @if ($errors->has('trenutno_posadeno'))
                <p class="plant">{{ $errors->first('trenutno_posadeno') }}</p>
                @endif
            </label>

            <label class="label" for="prethodno_posadeno">
                Prethodno Posa??eno:
                <input class="input is-success" id="prethodno_posadeno" type="text" placeholder="Prethodno Posadeno" name="prethodno_posadjeno" value="{{ $plot->prethodno_posadjeno }}" />
         
                @if ($errors->has('prethodno_posadeno'))
                <p class="plant">{{ $errors->first('prethodno_posadeno') }}</p>
                @endif
            </label>

            <label class="label" for="buduce_posadeno">
                Buduce Posa??eno:
                <input class="input is-success" id="buduce_posadeno" type="text" placeholder="Buduce Posadeno" name="buduce_posadjeno" value="{{ $plot->buduce_posadjeno }}" />
    
                @if ($errors->has('buduce_posadeno'))
                <p class="plant">{{ $errors->first('buduce_posadeno') }}</p>
                @endif
            </label>

            <div>
                <input class="button is-center is-link is-success" id="butAdd" type="submit" value="Spremi promjene" />
            </div>

        </form>

        
        <br>


        </form>
    </div>
</div>
<style scoped>
    #artikl {
        text-align: left;
        width: 1000px;
        max-width: 100%;
        max-height: 100%;
        padding: 8% 0 0;
        margin: auto;
        position: relative;
    }

    .box {
        max-width: 100%;
        max-height: 100%;
        height: 200px;
        width: 900px;
    }

    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 1000px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: left;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    .home-radio input {
        width: auto;
        margin: 10px;
    }

    .radijo {
        text-align: center;
    }


    .form button {
        width: 100%;
    }

    .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
    }

    .form .message a {
        color: #4CAF50;
        text-decoration: none;
    }

    .form .register-form {
        display: none;
    }


    .error-message {
        display: block;
        padding-bottom: 10px;
        color: red;
    }
</style>
@endsection