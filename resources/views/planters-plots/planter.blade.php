@extends('app')

@section('pageTitle', 'Rasadnici')

@section('content')

<div class="container">
    <input class="input" type="text" placeholder="Traži rasadnik...">


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
              <p>{{ $plot->naziv_plota }}</p>
              <p>{{ $plot->vrsta_plota }}</p>
              <p>{{ $plot->trenutno_posadjeno }}</p>
              <p>{{ $plot->prethodno_posadjeno }}</p>
              <p>{{ $plot->buduce_posadjeno }}</p>
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
    <!--pagination-->
    <div id="fixSide" class="mb-5 pb-10">
      {{ $plots->links() }}
    </div>
    <br><br>
  </div>
  
</div>



<script scoped>
  //buttons
  const dodajButton = document.querySelector('#dodaj');
  const editButton = document.querySelector('#edit');
  const deleteButton = document.querySelector('#delete');
  const deleteBuyerButton = document.querySelector('#deletebuyer');

  const canceleditButton = document.querySelector('#canceledit');
  const canceldodajButton = document.querySelector('#canceldodaj');
  const canceldeleteButton = document.querySelector('#canceldelete');

  //modal background
  const modalBg = document.querySelector('.modal-background');

  //modal delete
  const modalDelete = document.querySelector('#modalDelete');
  const modalDeleteBuyer = document.querySelector('#modalDeleteBuyer')

  //event listeners
  deleteButton.addEventListener('click', () => {
    modalDelete.classList.add('is-active');
  })

  deleteBuyerButton.addEventListener('click', () => {
    modalDeleteBuyer.classList.app('is-active');
  })
</script>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<style>
#fixSide{
  float:right;
}
.pagination-list{
  flex-wrap: nowrap;
}
</style>
@endsection