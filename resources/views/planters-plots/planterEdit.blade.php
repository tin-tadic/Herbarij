@extends('app')

@section('pageTitle', 'Dodaj rasadnik')

@section('content')

<div id="artikl" class="container is-centered">
    <div class="form">
        <form class="contact-form" action="/editPlanter/{{ $planter->id }}" method="POST" enctype="multipart/form-data">
<<<<<<< HEAD

            <label class="label" for="id_rasadnika">
                ID rasadnika:
                <input class="input is-success" id="id_rasadnika" name="id_rasadnika" type="number" placeholder="ID rasadnika" />
                    
                @if ($errors->has('id_rasadnika'))
                <p class="plant">{{ $errors->first('id_rasadnika') }}</p>
                @endif
            </label>

            <label class="label" for="naziv_rasadnika">
                <span class="left">Naziv rasadnika:</span>
                <input class="input is-success" id="naziv_rasadnika" name="naziv_rasadnika" type="text" placeholder="Naziv rasadnika" />
               
                @if ($errors->has('naziv_rasadnika'))
                <p class="plant">{{ $errors->first('naziv_rasadnika') }}</p>
                @endif
            </label>

            <label class="label" for="lokacija">
                <span class="left">Naziv lokacije:</span>
                <input class="input is-success" id="lokacija" name="lokacija" type="text" placeholder="Naziv lokacije" />
                    
                @if ($errors->has('lokacija'))
                <p class="plant">{{ $errors->first('lokacija') }}</p>
                @endif
=======
            @csrf
            <label class="label" for="naziv_rasadnika">
                <span class="left">Naziv rasadnika:</span>
                <input class="input is-success" id="naziv_rasadnika" name="naziv_rasadnika" type="text" placeholder="Naziv rasadnika" value="{{ $planter->naziv_rasadnika }}" />
            </label>

            <label class="label" for="lokacija">
                <span class="left">Lokacija rasadnika:</span>
                <input class="input is-success" id="lokacija" name="lokacija" type="text" placeholder="Naziv lokacije" value="{{ $planter->lokacija }}" />
>>>>>>> 6336f1b03acc00033103114eed57fca98fb406cc
            </label>


            <label class="label" for="vrsta_rasadnika">
                <span class="left">Vrsta rasadnika:</span>
<<<<<<< HEAD
                <input class="input is-success" id="vrsta_rasadnika" name="vrsta_rasadnika" type="text" placeholder="Vrsta rasadnika" />
               
                @if ($errors->has('vrsta_rasadnika'))
                <p class="plant">{{ $errors->first('vrsta_radnika') }}</p>
                @endif
=======
                <input class="input is-success" id="vrsta_rasadnika" name="vrsta" type="text" placeholder="Vrsta rasadnika" value="{{ $planter->vrsta }}" />
>>>>>>> 6336f1b03acc00033103114eed57fca98fb406cc
            </label>


            <label class="label" class="left" for="povrsina">
                Povrsina:
<<<<<<< HEAD
                <input class="input is-success" id="povrsina" name="povrsina" type="number" placeholder="Povrsina" />
                    
                @if ($errors->has('povrsina'))
                <p class="plant">{{ $errors->first('povrsina') }}</p>
                @endif
=======
                <input class="input is-success" id="povrsina" name="povrsina" type="number" placeholder="Povrsina" value="{{ $planter->povrsina }}" />
>>>>>>> 6336f1b03acc00033103114eed57fca98fb406cc
            </label>

            <label class="label" for="vrsta_tla">
                Vrsta tla:
<<<<<<< HEAD
                <input class="input is-success" id="vrsta_tla" name="vrsta_tla" type="text" placeholder="Vrsta tla">
                    
                @if ($errors->has('vrsta_tla'))
                <p class="plant">{{ $errors->first('vrsta_tla') }}</p>
                @endif
=======
                <input class="input is-success" id="vrsta_tla" name="vrsta_tla" type="text" placeholder="Vrsta tla" value="{{ $planter->vrsta_tla }}" />
>>>>>>> 6336f1b03acc00033103114eed57fca98fb406cc

            </label>

            <label class="label" for="komentar">
                Komentar:
<<<<<<< HEAD
                <input class="input is-success" id="komentar"  name="komentar" type="text" placeholder="Komentar">
                    
                @if ($errors->has('komentar'))
                <p class="plant">{{ $errors->first('komentar') }}</p>
                @endif
=======
                <input class="input is-success" id="komentar" name="komentar" type="text" placeholder="Komentar" value="{{ $planter->komentar }}" />
>>>>>>> 6336f1b03acc00033103114eed57fca98fb406cc

            </label>



        <div>
            <input class="button is-center is-link is-success" id="butAdd" type="submit" value="Spremi promjene" />
        </div>
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

    .form button:hover,
    .form button:active,
    .form button:focus {
        background: #43A047;
    }

    .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
    }

    .form .message a {
        color: #274f42;
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
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
@endsection