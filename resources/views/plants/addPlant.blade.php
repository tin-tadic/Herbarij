@extends('app')

@section('pageTitle', 'Dodaj novu biljku')

@section('content')
<div class="container">
    <div>
        <!--navbar-->
        <nav id="viridian" class="navbar is-transparent is-boxed is-spaced has-shadow" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="">
            <img src="sprout (1).png" height="28">
            </a>
    
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            </a>
        </div>
    
        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
            <a class="navbar-item">
                Naslovna
            </a>
    
            <a class="navbar-item">
                O nama
            </a>
    
            <a class="navbar-item">
                Biljke
            </a>
    
            <a class="navbar-item">
                Nešto treće
            </a>
    
            <!-- ovaj dio je za drop down meni, nije potreban?
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                More
                </a>
        
                <div class="navbar-dropdown">
                <a class="navbar-item">
                    About
                </a>
                <a class="navbar-item">
                    Jobs
                </a>
                <a class="navbar-item">
                    Contact
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item">
                    Report an issue
                </a>
                </div>
            </div>-->
            </div>
    
            <div class="navbar-end">
            <div class="navbar-item">
                <div class="control">
                <input class="input is-success" type="text" placeholder="Search">
                </div>
            </div>
            </div>
        </div>
        </nav>
    </div>
    <!--kraj navbar-a-->

    <div id="artikl" class="artikl">
        <div class="form">
            <form class="contact-form" action="/dodaj-biljku" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="ime">
                    <span class="left">Ime:</span>
                    <input id="ime" name="naziv" type="text" placeholder="Naziv biljke" />
                </label>
                <label for="narodno_ime">
                    <span class="left">Narodno ime:</span>
                    <input id="narodno_ime" type="text" name="narodna_imena" placeholder="Narodno ime biljke" />
                </label>
                <label class="left" for="tip_tla">
                    <span class="left">Tip tla:</span>
                    <input id="tip_tla" type="text" name="tip_tla" placeholder="Tip tla" />
                </label>
                <label class="left" for="cijena"><!--TRENUTNA CIJENA??-->
                    <span class="left">Cijena:</span> 
                    <select name="kolicina_cijene"  id="jedinica">
                        <option value="kg">Kg</option>
                        <option value="jed">Jedinica</option>
                    </select>
                    <input id="cijena" name="trenutna_cijena" type="text" placeholder="Cijena" />
                </label>

                <label for="vrijeme_sadnje">
                    Vrijeme sadnje:
                    <input id="vrijeme_sadnje" name="vrijeme_sadnje" type="date">

                </label>

                <label for="vrijeme_zetve">
                    Vrijeme zetve:
                    <input id="vrijeme_zetve" name="vrijeme_zetve" type="date">

                </label>

                <label for="vrijeme_orezivanja">
                    Vrijeme orezivanja:
                    <input id="vrijeme_orezivanja" name="vrijeme_orezivanja" type="date">

                </label>
                <div class="radijo">
                    <span class="home-radio">
                        <label for="card-byNumber">
                            Jestivo za ljude
                            <input type="radio" name="jestivost_ljudi" id="card-byNumber" value="1">

                        </label>
                    </span>
                    <span class="home-radio">
                        <label for="card-byUuid">
                            <input type="radio" name="jestivost_ljudi" id="card-byUuid" value="0">
                            Nije jestivo za ljude
                        </label>
                    </span>
                    <br>

                    <span class="home-radio">
                        <label for="card-byNumber">
                            Jestivo za zivotinje
                            <input type="radio" name="jestivost_zivotinje" id="card-byNumber" value="1">

                        </label>
                    </span>

                    <span class="home-radio">
                        <label for="card-byUuid">
                            <input type="radio" name="jestivost_zivotinje" id="card-byUuid" value="0">
                            Nije jestivo za zivotinje
                        </label>
                    </span>
                    <br>

                    <span class="home-radio">
                        <label for="card-byNumber">
                            Ljekovito
                            <input type="radio" name="ljekovitost" id="card-byNumber" value="1">

                        </label>
                    </span>

                    <span class="home-radio">
                        <label for="card-byUuid">
                            <input type="radio" name="ljekovitost" id="card-byUuid" value="0">
                            Nije ljekovito
                        </label>
                    </span>
                    <br>

                    <span class="home-radio">
                        <label for="card-byNumber">
                            Otrovno
                            <input type="radio" name="otrovno" id="card-byNumber" value="1">

                        </label>
                    </span>

                    <span class="home-radio">
                        <label for="card-byUuid">
                            <input type="radio" name="otrovno" id="card-byUuid" value="0">
                            Nije otrovno
                        </label>
                    </span>
                    <br>

                    <span class="home-radio">
                        <label for="card-byNumber">
                            Upotrebljivo kao gorivo
                            <input type="radio" name="gorivo" id="card-byNumber" value="1">

                        </label>
                    </span>

                    <span class="home-radio">
                        <label for="card-byUuid">
                            <input type="radio" name="gorivo" id="card-byUuid" value="0">
                            Nije upotrebljivo kao gorivo
                        </label>
                    </span>
                    <br>

                    <span class="home-radio">
                        <label for="card-byNumber">
                            Upotrebljivo kao gnjojivo
                            <input type="radio" name="gnjojivo" id="card-byNumber" value="1">

                        </label>
                    </span>

                    <span class="home-radio">
                        <label for="card-byUuid">
                            <input type="radio" name="gnjojivo" id="card-byUuid" value="0">
                            Nije upotrebljivo kao gnjojivo
                        </label>
                    </span>
                    <br>

                    <span class="home-radio">
                        <label for="card-byNumber">
                            Upotrebljivo kao sirovina
                            <input type="radio" name="sirovina" id="card-byNumber" value="1">

                        </label>
                    </span>

                    <span class="home-radio">
                        <label for="card-byUuid">
                            <input type="radio" name="sirovina" id="card-byUuid" value="0">
                            Nije upotrebljivo kao sirovina
                        </label>
                    </span>
                    <br>
                </div>
                <input type="tekst" name="komentar" placeholder="Komentar" />

                <textarea class="box" placeholder="Opis"></textarea>

                <p>Izaberite sliku ovdje:</p>
                <input type="file" name="slika" id="slika" />

                <div>
                    <input class="button" type="submit" value="Dodaj biljku" />
                </div>


            </form>
        </div>
    </div>
</div>


<style scoped>
    /*za sve str*/
  body {
    font-family: 'Roboto', sans-serif;
  }
  .navbar-item {
    color: white;
  }
  #viridian {
    background-color: #40826d;
    color: white;
    font-weight: bold;
  }
  #viridian a:hover{
    color:#274f42;
    text-shadow: 2px 2px 5px #274f42;
  }
  /*za sve str*/
    .artikl {
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

    .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
    }

    .home-radio input {
        width: auto;
        margin: 10px;
    }

    .radijo {
        text-align: center;
    }


    .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #40826d;
        width: 100%;
        border: 0;
        padding: 25px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
    }

    .form button:hover,
    .form button:active,
    .form button:focus {
        background: #40826d;
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


    .error-message {
        display: block;
        padding-bottom: 10px;
        color: red;
    }
   
</style>

@endsection
