@extends('app')

@section('pageTitle', 'Dodaj novu biljku')

@section('content')
<div class="container">

    <div id="artikl" class="artikl">
        <div class="form">
            <form class="contact-form" action="/dodaj-biljku" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="label" for="ime">
                    <span class="left">Ime:</span>
                    
                    <input class="input is-success" id="ime" name="naziv" type="text" placeholder="Naziv biljke" />
                        
                    @if ($errors->has('naziv'))
                        <p class="plant">{{ $errors->first('naziv') }}</p>
                    @endif
                    
                </label>

                <label class="label" for="narodno_ime">
                    <span class="left">Narodno ime:</span>
                    <input class="input is-success" id="narodno_ime" type="text" name="narodna_imena" placeholder="Narodno ime biljke" />
              
                    @if ($errors->has('narodno_ime'))
                        <p class="plant">{{ $errors->first('narodno_ime') }}</p>
                    @endif
                </label>

                <label class="label" for="tip_tla">
                    <span class="left">Tip tla:</span>
                    <input class="input is-success" id="tip_tla" type="text" name="tip_tla" placeholder="Tip tla" />
                    
                    @if ($errors->has('tip_tla'))
                        <p class="plant">{{ $errors->first('tip_tla') }}</p>
                    @endif
                </label>
                <label class="label" for="cijena"><!--TRENUTNA CIJENA??-->
                    <span class="left">Cijena:</span> 
                    <select name="kolicina_cijene"  id="jedinica">
                        <option value="kg">Kg</option>
                        <option value="jed">Jedinica</option>
                    </select>
                    <input class="input is-success" id="cijena" name="trenutna_cijena" type="text" placeholder="Cijena" />
                   
                    @if ($errors->has('trenutna_cijena'))
                        <p class="plant">{{ $errors->first('trenutna_cijena') }}</p>
                    @endif
               
                </label>

                <label class="label" for="vrijeme_sadnje">
                    Vrijeme sadnje:
                    <input class="input is-success" id="vrijeme_sadnje" name="vrijeme_sadnje" type="date">
                        
                    @if ($errors->has('vrijeme_sadnje'))
                        <p class="plant">{{ $errors->first('vrijeme_sadnje') }}</p>
                    @endif

                </label>

                <label class="label" for="vrijeme_zetve">
                    Vrijeme zetve:
                    <input class="input is-success" id="vrijeme_zetve" name="vrijeme_zetve" type="date">
                        
                    @if ($errors->has('vrijeme_zetve'))
                        <p class="plant">{{ $errors->first('vrijeme_zetve') }}</p>
                    @endif

                </label>

                <label class="label" for="vrijeme_orezivanja">
                    Vrijeme orezivanja:
                    <input class="input is-success" id="vrijeme_orezivanja" name="vrijeme_orezivanja" type="date">
    
                    @if ($errors->has('vrijeme_orezivanja'))
                     <p class="plant">{{ $errors->first('trenutna_cijena') }}</p>
                     @endif
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
                    @if ($errors->has('jestivost_ljudi') ||$errors->has('jestivost_zivotinje') ||$errors->has('ljekovitost') ||$errors->has('otrovno') ||$errors->has('gorivo') ||
                    $errors->has('gnjojivo') ||$errors->has('sirovina'))
                        <p class="plant">Obavezno je odabrati sve atribute!</p>
                    @endif

                </div>

                <div class="field">
                <label for="komentar" class="label">Komentar</label>
                <input class="input is-success" type="tekst" name="komentar" placeholder="Komentar" />
               
                </div>
                
                
                 <label class="label">Opis</label>
                <textarea class="textarea is-success" name="opis" placeholder="Opis"></textarea>

                <br>
                <br>

                <div class="file is-success">
                <label class="file-label">
                  <input class="file-input" type="file" name="slika" id="slika">
                  <span class="file-cta">
                    <span class="file-icon">
                      <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                      Dodaj sliku…
                    </span>
                  </span>
                </label>
                @if ($errors->has('slika'))
                     <p class="plant">{{ $errors->first('slika') }}</p>
                @endif
              </div>




                <br>
                <br>
                <div>
                    <input class="button is-center is-link is-success" id="butAdd" type="submit" value="Dodaj biljku" />
                </div>

                <br>

            </form>
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
  #butAdd{
      width:100%;
      
  }
  #butCan{
      width:100%;
      
  }
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