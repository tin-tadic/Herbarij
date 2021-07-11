@extends('app')

@section('pageTitle', 'Biljke')

@section('content')


<div class="container skoci">
  <!--Kartice-->
  <form action="/plantSearch" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="field has-addons is-pulled-right">
        <div class="control">
          <input class="input" type="text" name="lookForPlant" placeholder="Pretraži biljke...">
        </div>
    
          <div class="control">
            <button class="button is-success">
              Pretraga
            </button>
        </div>
    </div>


    <div class="control is-pulled-right">
      <label class="radio">
        <input type="radio" name="orderBy" value="asc" checked>
        Ascending
      </label>
      <label class="radio">
        <input type="radio" name="orderBy" value="desc">
        Descending
      </label>
    </div>
  </form>
  <section class="section">
    <div class="container">
      <!--<h3 class="title has-text-centered is-size-4">Biljke</h3>-->
      <div class="mt-5 is-8 columns is-multiline is-centered is-variable">

        @foreach ($plants as $plant)
        <div class="column is-4-tablet is-3-desktop">
          <div class="card">
            <div class="card-image has-text-centered px-6">
              <img src="/storage/plantPictures/{{ $plant->slika }}" alt="Placeholder image">
            </div>
            <div class="card-content">
              <p>{{ round($plant->trenutna_cijena, 2) }}KM/{{ $plant->kolicina_cijene }}</p>
              <p class="title is-size-5">{{ $plant->naziv }}</p>
            </div>
            <footer class="card-footer">
              <p class="card-footer-item">
                <button onclick="location.href='{{ route('getPlantForEdit', $plant->id) }}'" type="button" class="button is-small mt-5" id="edit">Edit</button>
                <button onclick="location.href='{{ route('viewPlant', $plant->id) }}'" type="button" class="button is-small mt-5" id="view">View</button>
                <button class="button is-small mt-5" id="delete" onclick="event.preventDefault();
                      if(confirm('Jeste li sigurni da želite izbrisati ovu biljku?')) {
                            document.getElementById(`deletePlant_{{ $plant->id }}`).submit();
                          }">
                  Delete
                </button>
              <form id="deletePlant_{{ $plant->id }}" action="{{ route('deletePlant', ['plantId' => $plant->id]) }}" method="POST">
                @csrf
              </form>
              </p>
            </footer>
          </div>
        </div>
        @endforeach

      </div>
    </div>

  </section>

  <div>
    <button class="button mt-5" id="dodaj" onclick="location.href='{{ route('getAddPlant') }}'">Dodaj Biljku</button>
    <!--pagination-->
    @if ($noLinks == 0)
    <div id="fixSide" class="mb-5 pb-10">
      {{ $plants->links() }}
    </div>
    @endif
  </div>
</div>
</div>



<script scoped>
  //Button idovi
  const dodajButton = document.querySelector('#dodaj');
  const editButton = document.querySelector('#edit');
  const deleteButton = document.querySelector('#delete');
  const deleteplantButton = document.querySelector('#deleteplant');
  const viewoneButton = document.querySelector('#viewone');

  //Idovi specificnih "cancel" dugmadi
  const canceleditButton = document.querySelector('#canceledit');
  const canceldodajButton = document.querySelector('#canceldodaj');
  const canceldeleteButton = document.querySelector('#canceldelete');


  //Za modal pozadinu
  const modalBg = document.querySelector('.modal-background');

  //Modali
  const modalDodaj = document.querySelector('#modalDodaj');
  const modalEdit = document.querySelector('#modalEdit');
  const modalDelete = document.querySelector('#modalDelete');
  const modalDeleteplant = document.querySelector('#modalDeleteplant');


  //Event listeneri za modale
  dodajButton.addEventListener('click', () => {
    modalDodaj.classList.add('is-active');
  })

  editButton.addEventListener('click', () => {
    modalEdit.classList.add('is-active');
  })

  deleteButton.addEventListener('click', () => {
    modalDelete.classList.add('is-active');
  })

  deleteplantButton.addEventListener('click', () => {
    modalDeleteplant.classList.add('is-active');
  })


  //Event listeneri za cancel dugmad
  canceldodajButton.addEventListener('click', () => {
    modalDodaj.classList.remove('is-active');
  })

  canceleditButton.addEventListener('click', () => {
    modalEdit.classList.remove('is-active');
  })

  canceldeleteButton.addEventListener('click', () => {
    modalDelete.classList.remove('is-active');
  })
</script>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<style>
  #fixSide {
    float: right;
  }

  .pagination-list {
    flex-wrap: nowrap;
  }
  .skoci{
    margin-top: 100px;
  }
  .button{

  }
</style>
@endsection