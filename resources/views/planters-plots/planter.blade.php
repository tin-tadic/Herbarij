@extends('app')

@section('pageTitle', 'Rasadnici')

@section('content')
<div class="skoci">
  <form action="/searchForPlanter" method="get">
    <div class="field has-addons is-pulled-right">
      <div class="control">
        <input class="input" type="text" name="lookForPlanter" placeholder="Upiši id rasadnika..">
      </div>
      <div class="control">
        <button type="submit" class="button is-success">
          Pretraga
        </button>
      </div>
    </div>
    </form>

  <section class="section">
    <div class="container">
      <!--<h3 class="title has-text-centered is-size-4"></h3>-->
      <br><br>
      <div class="columns mt-5 is-8 is-variable is-centered is-multiline">
        @foreach ($plots as $plot)
        <div class="column is-4-tablet is-3-desktop">
          <div class="card">
            <div class="card-image has-text-centered px-6">
              <img src="/storage/assets/plot.png" alt="greenhouse">
            </div>
            <div class="card-content">
              <p>Naziv plota: {{ $plot->naziv_plota }}</p>
              <p>Vrsta plota: {{ $plot->vrsta_plota }}</p>
              <p>Trenutno posađeno: {{ $plot->trenutno_posadjeno }}</p>
              <p>Prethodno posađeno: {{ $plot->prethodno_posadjeno }}</p>
              <p>Buduće posađeno: {{ $plot->buduce_posadjeno }}</p>
            </div>
            <footer class="card-footer">
              <p class="card-footer-item">
                <button onclick="location.href='{{ route('getPlotForEdit', $plot->id) }}'" type="button" class="button mt-5" id="edit"> Edit </button>
                <button class="button mt-5" id="delete" onclick="event.preventDefault();
                  if(confirm('Jeste li sigurni da želite obrisati plot?')) {
                    document.getElementById(`deletePlot_{{ $plot->id }}`).submit();
                  }">Delete
                </button>
              <form id="deletePlot_{{ $plot->id }}" action="{{ route('deletePlot', ['plotId' => $plot->id]) }}" method="POST"> @csrf </form>
              </p>
            </footer>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>
</div>

<div>
  <button class="button mt-4" id="addPlot" onclick="location.href='{{ route('getAddPlot') }}'">Dodaj Plot</button>
  <button class="button mt-4" id="addPlot" onclick="location.href='{{ route('getPlanterForEdit', $planter->id) }}'">Edit Rasadnika</button>
  
  <br><br>
</div>

</div>
</div>





<style>
  #fixSide {
    float: right;
  }

  .pagination-list {
    flex-wrap: nowrap;
  }

  .skoci {
    margin-top: 100px;
  }
</style>
@endsection