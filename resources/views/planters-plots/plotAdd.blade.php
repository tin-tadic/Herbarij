@extends('app')

@section('pageTitle', 'Dodaj plot')

@section('content')

<div id="artikl" class="container is-centered">
    <div class="form">
        <form class="contact-form" action="/addPlot" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="label" for="id_rasadnika">
                ID rasadnika:
                <input class="input is-success" id="id_rasadnika" type="number" name="id_rasadnika" placeholder="ID Rasadnika" />
            </label>

            <label class="label" for="naziv_rasadnika">
                <span class="left">Naziv plota:</span>
                <input class="input is-success" id="naziv_rasadnika" type="text" name="naziv_plota" placeholder="Naziv rasadnika" />
            </label>

            <label class="label" for="lokacija">
                <span class="left">Vrsta plota:</span>
                <input class="input is-success" id="lokacija" type="text" name="vrsta_plota" placeholder="Naziv lokacije" />
            </label>


            <label class="label" for="broj_sadnica">
                <span class="left">Broj sadnica:</span>
                <input class="input is-success" id="broj_sadnica" type="number" name="broj_sadnica" placeholder="Broj sadnica" />
            </label>

            </label>

            <label class="label" for="trenutno_posadeno">
                Trenutno Posadeno:
                <input class="input is-success" id="trenutno_posadeno" type="text" name="trenutno_posadjeno" placeholder="Trenutno Posadeno">

            </label>

            <label class="label" for="prethodno_posadeno">
                Prethodno Posadeno:
                <input class="input is-success" id="prethodno_posadeno" type="text" name="prethodno_posadjeno" placeholder="Prethodno Posadeno">

            </label>

            <label class="label" for="buduce_posadeno">
                Buduce Posadeno:
                <input class="input is-success" id="buduce_posadeno" type="text" name="buduce_posadjeno" placeholder="Buduce Posadeno">

            </label>

            <div>
                <input class="button is-center is-link is-success" id="butAdd" type="submit" value="Dodaj plot" />
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

    .form button:hover,
    .form button:active,
    .form button:focus {
        background: #274f42;
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
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
@endsection