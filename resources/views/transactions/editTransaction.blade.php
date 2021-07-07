@extends('app')

@section('pageTitle', 'Dodaj transakcije')

@section('content')
<section class="section">
<div class="container">
    <h1 id="naslov">Uredi transakciju</h1>
    <div id="artikl">
        <form class="contact-form" action="/uredi-transakciju" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="label" for="naz-artikla">
                <span class="left">Naziv artikla:</span>
                <input class="input is-success" id="naz-artikla" name="naz-artikla" type="text" placeholder="Naziv artikla"/>
            </label>
            <label class="label" for="datum-transakc">
                <span class="left">Datum transakcije:</span>
                <input class="input is-success" id="datum-transakc" name="datum" type="text" placeholder="Datum transakcije"/>
            </label>
            <label class="label" for="kolicina">
                <span class="left">Količina proizvoda:</span>
                <input class="input is-success" id="kolicina" type="text" placeholder="Kolicina"/>
            </label>
            <label class="label" for="price">
                <span class="left">Cijena proizvoda:</span>
                <input class="input is-success" id="price" name="price" type="text" placeholder="Cijena artikla"/>
            </label>
            <input type="button" class="button is-large is-fullwidth is-focus is-success is-outlined" value="Submit">
        </form>
    </div>
</div>
</section>
<script scoped>
  //buttons
  const dodajButton = document.querySelector('#dodaj');
  const editButton = document.querySelector('#edit');
  const deleteButton = document.querySelector('#delete');
  const deleteTransactionButton = document.querySelector('#deletetransaction');

  const canceleditButton = document.querySelector('#canceledit');
  const canceldodajButton = document.querySelector('#canceldodaj');
  const canceldeleteButton = document.querySelector('#canceldelete');

  //modal background
  const modalBg = document.querySelector('.modal-background');

  //modal delete
  const modalDelete = document.querySelector('#modalDelete');
  const modalDeleteBuyer = document.querySelector('#modalDeleteTransaction')

  //event listeners
  deleteButton.addEventListener('click', () => {
    modalDelete.classList.add('is-active');
  })

  deleteBuyerButton.addEventListener('click', () => {
    modalDeleteBuyer.classList.app('is-active');
  })
</script>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
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