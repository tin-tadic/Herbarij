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

</div>

<div>
  <button class="button mt-4" id="addPlot" onclick="location.href='{{ route('getAddPlanter') }}'">Dodaj Rasadnik</button>
  <br><br>
</div>

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