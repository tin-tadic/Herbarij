@extends('app')

@section('pageTitle', 'Customers')

@section('content')
<div class="container">
  <section class="section">
    <div class="container">
      <!--<h3 class="title has-text-centered is-size-4"></h3>-->
      <br><br>
      <div class="columns mt-5 is-8 is-variable is-centered is-multiline">
        @foreach ($buyers as $buyer)
          <div class="column is-4-tablet is-3-desktop">
            <div class="card">
              <div class="card-image has-text-centered px-6">
                <img src="public\storage\assets\user.png" alt="customer image">
              </div>
              <div class="card-content">
                <p>{{ $buyer->ime }}</p>
                <p>{{ $buyer->adresa }}</p>
                <p>{{ $buyer->tip }}</p>
              </div>
              <footer class="card-footer">
                <p class="card-footer-item">
                  <button onclick="location.href='{{ route('getBuyerForEdit', $buyer->id) }}'" type="button" class="button mt-5" id="edit"> Edit </button>
                  <button class="button mt-5" id="delete" onclick="event.preventDefault();
                  if(confirm('Jeste li sigurni da želite obrisati kupca?')) {
                    document.getElementById(`deleteBuyer_{{ $buyer->id }}`).submit();
                  }">Delete
                  </button>
                  <form id="deleteBuyer_{{ $buyer->id }}" action="{{ route('deleteBuyer', ['buyerId' => $buyer->id]) }}" method="POST"> @csrf </form>
                </p>
              </footer>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <button class="button mt-4" id="addCostumer" onclick="location.href='{{ route('addBuyer') }}'">Dodaj Kupca</button>
</div>
<!-- modal za brisanje -->
<div class="modal" id="modalDelete">
  <div class="modal-background"></div>
  <div class="modal-content has-background-white py-5 px-5">
    <h3 class="title mb-6">Jeste li sigurni da želite izbrisati kupca?</h3>
    <div class="container">
      <form>
        <div class="field">
          <button class="button is-link is-success is-pulled-right" id="canceldelete">Cancel</button>
        </div>
        <div class="field">
          <button class="button is-link is-danger is-pulled-left" >Delete</button>
        </div>
      </form>
    </div>
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
  deleteButton.addEventListener('click', ()=>{
    modalDelete.classList.add('is-active');
  })

  deleteBuyerButton.addEventListener('click', ()=>{
    modalDeleteBuyer.classList.app('is-active');
  })
  
</script>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
@endsection