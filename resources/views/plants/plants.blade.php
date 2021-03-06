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
  <button class="button" id="dodaj" onclick="location.href='{{ route('getAddPlant') }}'">Dodaj Biljku</button>
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

  <div class="m-5">
    <!--pagination-->
    @if ($noLinks == 0)
    <div id="fixSide">
      {{ $plants->links() }}
    </div>
    @endif
  </div>
</div>
</div>




<style>
  #fixSide {
    float: right;
    margin-bottom: 100px;
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