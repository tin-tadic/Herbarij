@extends('app')

@section('pageTitle', 'Customers')

@section('content')
<div>
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
              <img src="storage/assets/user.png" alt="customer image">
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
  <div>
    <button class="button mt-4" id="addCostumer" onclick="location.href='{{ route('addBuyer') }}'">Dodaj Kupca</button>
    <!--pagination-->
    <div id="fixSide" class="mb-5 pb-10">
      {{ $buyers->links() }}
    </div>
    <br><br>
  </div>
  
</div>

<style>
#fixSide{
  float:right;
}
.pagination-list{
  flex-wrap: nowrap;
}
</style>
@endsection