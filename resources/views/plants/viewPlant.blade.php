@extends('app')

@section('pageTitle', 'Informacije o biljci')

@section('content')
<div class="container">
<div>
    <!--navbar-->
    <nav id="viridian" class="navbar is-transparent is-boxed is-spaced has-shadow" role="navigation"
      aria-label="main navigation">
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

        {{-- TODO::What is up with these HTML and CSS names? --}}
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
  <!--sadrzaj-->
  <div id="mom">
    <div id="mainDiv">
      <p class="hero is-white is-small">{{ $plant->naziv }}</p>
      <p id="herosml3" class="hero is-white is-small">{{ $plant->narodna_imena }}</p>
      <div id="zaslikicu">
        <img id="slikica"
          src="https://images.pexels.com/photos/954046/pexels-photo-954046.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
        <div id="noticeMeSenpai"><a id="put" href="#sideChick">Pregledajte biljnu putovnicu</a></div>
      </div>

      <div id="tablica">
        <table class="table is-hoverable is-striped is-fullwidth">
          <tr>
            <th class="smaller">Naziv biljke:</th>
            <td class="bigger">{{ $plant->naziv }}</td>
          </tr>
          <tr>
            <th class="smaller">Narodni naziv biljke:</th>
            <td class="bigger">{{ $plant->narodna_imena }}</td>
          </tr>
          <tr>
            <th class="smaller">Tip tla:</th>
            <td class="bigger">{{ $plant->tip_tla }}</td>
          </tr>
          <tr>
            <th class="smaller">Cijena</th>
            <td class="bigger">{{ $plant->trenutna_cijena }}</td>
          </tr>
          <tr>
            {{-- TODO::Standardize date format --}}
            <th class="smaller">Vrijeme sadnje:</th>
            <td class="bigger">{{ $plant->vrijeme_sadnje }}</td>
          </tr>
          <tr>
            <th class="smaller">Vrijeme žetve:</th>
            <td class="bigger">{{ $plant->vrijeme_zetve }}</td>
          </tr>
          <tr>
            <th class="smaller">Vrijeme orezivanja:</th>
            <td class="bigger">{{ $plant->vrijeme_orezivanja }}</td>
          </tr>
          <tr>
            <th class="smaller">Jestivo za ljude:</th>
            <td class="bigger">{{ $plant->jestivost_ljudi }}</td>
          </tr>
          <tr>
            <th class="smaller">Jestivo za životinje:</th>
            <td class="bigger">{{ $plant->jestivost_zivotinje }}</td>
          </tr>
          <tr>
            <th class="smaller">Ljekovito:</th>
            <td class="bigger">{{ $plant->ljekovitost }}</td>
          </tr>
          <tr>
            <th class="smaller">Otrovno:</th>
            <td class="bigger">{{ $plant->otrovno }}</td>
          </tr>
          <tr>
            <th class="smaller">Upotrebljivo kao gorivo:</th>
            <td class="bigger">{{ $plant->gorivo }}</td>
          </tr>
          <tr>
            <th class="smaller">Upotrebljivo kao gnojivo:</th>
            <td class="bigger">{{ $plant->gnjojivo }}</td>
          </tr>
          <tr>
            <th class="smaller">Upotrebljivo kao sirovina:</th>
            <td class="bigger">{{ $plant->sirovina }}</td>
          </tr>
          <tr>
            <th class="smaller">Komentar:</th>
            <td class="bigger">{{ $plant->komentar }}</td>
          </tr>
          <tr>
            <th class="smaller">Opis:</th>
            <td class="bigger">{{ $plant->opis }}</td>
          </tr>
        </table>
      </div>

    </div>
    <!--biljna putovnica-->
    <div id="documentId">
      <div class="card">
        <div class="card-content">
          <img id="putImg" src="sprout (1).png" height="50px">
          <p class="title">
            Biljna putovnica</p>
          <p class="subtitle">
            podnaslov
          </p>
        </div>
        <div class="card-content">
          <table id="putovnica">
            <tr>
              <td id="prviPutovnica">
                <p class="debeli">ZSR</p>
                <p>Hrvatska</p>
                <p>RH Kvaliteta</p>
                <p>Datum:</p>
                <p>12.11.2009.</p>
              </td>
              <td id="drugiPutovnica">
                <p>Vrsta/botanički naziv:<span class="debeli">UBACITI</span></p>
                <p>Sorta/Klon: <span class="debeli">UBACITI</span></p>
                <p>Podloga/Klon: <span class="debeli">UBACITI</span></p>
                <p>Kategorija: <span class="debeli">UBACITI</span></p>
                <p>Naziv dobavljača: <span class="debeli">UBACITI</span></p>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <br><br><br><br><br>
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
    font-family: 'Poppins', sans-serif;
    font-size: 22px;
  }

  #viridian {
    background-color: #40826d;
    color: white;
    font-weight: bold;
  }

  #viridian a:hover {
    color: #274f42;
    text-shadow: 2px 2px 5px #274f42;
  }

  /*za sve str*/
  #mom {
    width: 100%;
    margin: auto;
  }

  #mainDiv {
    width: 90%;
    margin-top: 2%;
    text-align: center;
    margin: auto;
  }

  #documentId {
    width: 50%;
    text-align: center;
    margin: auto;
    content: "";
    clear: both;
    display: table;
  }

  #herosml3 {
    font-size: 17px;
  }

  .image {
    margin: auto;
    height: 200px;
    clear: both;
  }

  #tablica {
    width: 45%;
    margin: auto;
    margin-bottom: 50px;
    margin-top: 50px;
    text-align: center;
  }

  #slikica {
    height: 380px;
    width: 700px;
    -webkit-box-shadow: 0 0 15px #40826d;
    box-shadow: 0 0 15px #40826d;
    margin: 10px;
    clear: both;
  }

  #zaslikicu {
    clear: both;
  }

  .smaller {
    width: 220px;
  }

  .table {
    text-align: right;
  }

  td {

    text-align: left;
  }

  .hero {
    margin: 10px;
    font-size: 20px;
    font-weight: bold;
    font-family: 'Poppins', sans-serif;
  }

  #noticeMeSenpai {
    background-color: white;
    opacity: 80%;
    border-radius: 20px;
    position: relative;
    top: -80px;
    padding: 10px;
    width: 250px;
    margin: auto;
  }
  #put{
      font-weight:bold;
  }
  #put a:link {
    color: #40826d;
  }

  #put a:link {
    color: #40826d;
  }

  #put a:hover {
    color: #40826d;
  }
  #putovnica{
    width:100%;
  }
  #prviPutovnica{
    border-right:solid 1px black;
    width:35%;
    padding:5px;
  }
  #drugiPutovnica{
    padding:5px;
  }
  .debeli{
    font-weight:bold;
  }
  #putImg{
    padding:10px;
  }
</style>
@endsection