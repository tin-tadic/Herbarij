@extends('app')

@section('pageTitle', 'Dodaj rasadnik')

@section('content')

<div id="artikl" class="container is-centered">
    <div class="form">
        <form class="contact-form" action="/addPlanter" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="label" for="naziv_rasadnika">
                <span class="left">Naziv rasadnika:</span>
                <input class="input is-success" id="naziv_rasadnika" name="naziv_rasadnika" type="text" placeholder="Naziv rasadnika" />
            </label>

            <label class="label" for="lokacija">
                <span class="left">Lokacija rasadnika:</span>
                <input class="input is-success" id="lokacija" name="lokacija" type="text" placeholder="Naziv lokacije" />
            </label>


            <label class="label" for="vrsta_rasadnika">
                <span class="left">Vrsta rasadnika:</span>
                <input class="input is-success" id="vrsta_rasadnika" name="vrsta" type="text" placeholder="Vrsta rasadnika" />
            </label>


            <label class="label" class="left" for="povrsina">
                Povrsina:
                <input class="input is-success" id="povrsina" name="povrsina" type="number" placeholder="Povrsina" />
            </label>

            <label class="label" for="vrsta_tla">
                Vrsta tla:
                <input class="input is-success" id="vrsta_tla" name="vrsta_tla" type="text" placeholder="Vrsta tla">

            </label>

            <label class="label" for="komentar">
                Komentar:
                <input class="input is-success" id="komentar" name="komentar" type="text" placeholder="Komentar">

            </label>



        <div>
            <input class="button is-center is-link is-success" id="butAdd" type="submit" value="Dodaj rasadnik" />
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