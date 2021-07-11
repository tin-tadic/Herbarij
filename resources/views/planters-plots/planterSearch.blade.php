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