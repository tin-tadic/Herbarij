@extends('app')

@section('pageTitle', 'Pregledaj transakcije')

@section('content')
<div class="container">

    <div id="add-button">
        <button id="add-transaction" class="button is-light is-focus is-medium" onclick="location.href='{{ route('getAddTransaction') }}'">Add Transaction</button>
        <button id="add-transaction" class="button is-light is-focus is-medium" onclick="location.href='/download-pdf'">Download izvještaja</button>
    </div>
    <!--Tabovi-->
    <div id="ticket" class="ticket">
        <div class="tab">
            <a class="tablinks active" onclick="Switch(event, 'Prvi')">Kupovina</a>
            <a class="tablinks" onclick="Switch(event, 'Drugi')">Prodaja</a>
            <a class="tablinks" onclick="Switch(event, 'Treci')">Plan nabave</a>
        </div>

        <div class="form">
            <div id="Prvi" class="tabcontent">
                <div class="field has-addons">
                    <input class="input" id="s1" type="text" placeholder="Pretraga">
                    <div class="control"><button class="button is-success">Pretraga</button></div>
                </div>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="answer">
                        Kolicina
                    </label>
                    <label class="radio">
                        <input type="radio" name="answer">
                        Cijena
                    </label>
                    <label class="radio">
                        <input type="radio" name="answer">
                        Datum
                    </label>
                    <label class="radio">
                        <input type="radio" name="answer">
                        Artikal
                    </label>
                </div>

                <div class="control">
                    <label class="radio">
                        <input type="radio" name="answer">
                        Ascending
                    </label>
                    <label class="radio">
                        <input type="radio" name="answer">
                        Descending
                    </label>
                </div>
                <table class="table table-top">
                    <thead>
                        <tr>
                            <th>DATUM</th>
                            <th>ID PRODAVAČA</th>
                            <th>ARTIKAL</th>
                            <th>KOLIČINA</th>
                            <th>CIJENA</th>
                            <th>STATUS</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kupovine as $kupovina)
                        <tr>
                            <td>{{ date('d-m-Y', strtotime($kupovina->datum)) }}</td>

                            <td>{{ $kupovina->id_kupca }}</td>

                            <td>{{ $kupovina->artikl }}</td>

                            <td>{{ $kupovina->kolicina }}</td>

                            <td>{{ round($kupovina->cijena, 2) }}</td>

                            @if ($kupovina->stanje == "Naruceno")
                            <td id="blue">Naruceno</td>
                            @elseif ($kupovina->stanje == "Gotovo")
                            <td id="green">Gotovo</td>
                            @else
                            <td id="red">Otkazano</td>
                            @endif


                            <td><button class="button is-light" onclick="location.href='{{ route('editTransaction', $kupovina->id) }}'">Edit</button></td>
                            
                            <td class="del" onclick="event.preventDefault();
                            if(confirm('Jeste li sigurni da želite izbrisati ovu transakciju?')) {
                                  document.getElementById(`deleteKupovina_{{ $kupovina->id }}`).submit();
                                }">&#10008;</td>
                            <form id="deleteKupovina_{{ $kupovina->id }}" action="{{ route('deleteTransaction', ['transactionId' => $kupovina->id]) }}" method="POST">
                                @csrf
                            </form>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div id="fixSide" class="mb-5 pb-10">
                    {{ $kupovine->links() }}
                </div>

            </div>
            <!--Drugi za pregled statusa transakcija-->
            <div id="Drugi" class="tabcontent">
                <div class="field has-addons">
                    <input class="input" id="s1" type="text" placeholder="Pretraga">
                    <div class="control"><button class="button is-success">Pretraga</button></div>


                </div>

                <div class="control">
                    <label class="radio">
                        <input type="radio" name="answer">
                        Kolicina
                    </label>
                    <label class="radio">
                        <input type="radio" name="answer">
                        Cijena
                    </label>
                    <label class="radio">
                        <input type="radio" name="answer">
                        Datum
                    </label>
                    <label class="radio">
                        <input type="radio" name="answer">
                        Artikal
                    </label>
                </div>

                <div class="control">
                    <label class="radio">
                        <input type="radio" name="answer">
                        Ascending
                    </label>
                    <label class="radio">
                        <input type="radio" name="answer">
                        Descending
                    </label>
                </div>
                <table class="table table-top">
                    <thead>
                        <tr>
                            <th>DATUM</th>
                            <th>ID KUPCA</th>
                            <th>ARTIKAL</th>
                            <th>KOLIČINA</th>
                            <th>CIJENA</th>
                            <th>STATUS</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transakcije as $transakcija)
                        <tr>
                            <td>{{ date('d-m-Y', strtotime($transakcija->datum)) }}</td>

                            <td>{{ $transakcija->id_kupca }}</td>

                            <td>{{ $transakcija->artikl }}</td>

                            <td>{{ $transakcija->kolicina }}</td>

                            <td>{{ round($transakcija->cijena, 2) }}</td>

                            @if ($transakcija->stanje == "Naruceno")
                            <td id="blue">Naruceno</td>
                            @elseif ($transakcija->stanje == "Gotovo")
                            <td id="green">Gotovo</td>
                            @else
                            <td id="red">Otkazano</td>
                            @endif


                            <td><button class="button is-light" onclick="location.href='{{ route('editTransaction', $transakcija->id) }}'">Edit</button></td>
                            <td class="del" onclick="event.preventDefault();
                            if(confirm('Jeste li sigurni da želite izbrisati ovu transakciju?')) {
                                  document.getElementById(`deleteKupovina_{{ $transakcija->id }}`).submit();
                                }">&#10008;</td>
                            <form id="deleteKupovina_{{ $transakcija->id }}" action="{{ route('deleteTransaction', ['transactionId' => $transakcija->id]) }}" method="POST">
                                @csrf
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="fixSide" class="mb-5 pb-10">
                    {{ $transakcije->links() }}
                </div>

            </div>

            <div id="Treci" class="tabcontent">
                <div class="field has-addons">
                    <input class="input" id="s1" type="text" placeholder="Pretraga">
                    <div class="control"><button class="button is-success">Pretraga</button></div>


                </div>

                <div class="control">
                    <label class="radio">
                        <input type="radio" name="answer">
                        Kolicina
                    </label>
                    <label class="radio">
                        <input type="radio" name="answer">
                        Cijena
                    </label>
                    <label class="radio">
                        <input type="radio" name="answer">
                        Datum
                    </label>
                    <label class="radio">
                        <input type="radio" name="answer">
                        Artikal
                    </label>
                </div>

                <div class="control">
                    <label class="radio">
                        <input type="radio" name="answer">
                        Ascending
                    </label>
                    <label class="radio">
                        <input type="radio" name="answer">
                        Descending
                    </label>
                </div>
                <table class="table table-top">
                    <thead>
                        <tr>
                            <th>DATUM</th>
                            <th>ID KUPCA</th>
                            <th>ARTIKAL</th>
                            <th>KOLIČINA</th>
                            <th>CIJENA</th>
                            <th>STATUS</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nabave as $nabava)
                        <tr>
                            <td>{{ date('d-m-Y', strtotime($nabava->datum)) }}</td>

                            <td>{{ $nabava->id_kupca }}</td>

                            <td>{{ $nabava->artikl }}</td>

                            <td>{{ $nabava->kolicina }}</td>

                            <td>{{ round($nabava->cijena, 2) }}</td>

                            @if ($nabava->stanje == "Naruceno")
                            <td id="blue">Naruceno</td>
                            @elseif ($nabava->stanje == "Gotovo")
                            <td id="green">Gotovo</td>
                            @else
                            <td id="red">Otkazano</td>
                            @endif

                            <td><button class="button is-light" onclick="location.href='{{ route('editTransaction', $nabava->id) }}'">Edit</button></td>
                            <td class="del" onclick="event.preventDefault();
                            if(confirm('Jeste li sigurni da želite izbrisati ovu transakciju?')) {
                                  document.getElementById(`deleteKupovina_{{ $nabava->id }}`).submit();
                                }">&#10008;</td>
                            <form id="deleteKupovina_{{ $nabava->id }}" action="{{ route('deleteTransaction', ['transactionId' => $nabava->id]) }}" method="POST">
                                @csrf
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="fixSide" class="mb-5 pb-10">
                    {{ $nabave->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

<script scoped>
    function Switch(evt, ime) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(ime).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
<style scoped>
    .container {
        margin-top: 150px;
    }

    .ticket {
        position: relative;
        max-width: 1500px;
        /* padding: 8% 0 0;*/
        margin: auto;

        box-sizing: content-box;

    }

    #ticket {
        padding-top: 0px;
        box-sizing: content-box;
    }

    .tab {
        overflow: hidden;
        margin-left: 20px;
        padding: 3% 0 0;
        margin: auto;
    }

    #tab1 {
        padding-top: 0px;
    }

    .tab ul {
        list-style-type: none;
        margin-left: 20px;
    }

    .tab a {
        text-decoration: none;
        float: left;
        cursor: pointer;
        padding: 12px 24px;
        transition: background-color 0.2s;
        border: 1px solid #ccc;
        border-right: none;
        background-color: #f1f1f1;
        border-radius: 10px 10px 0 0;
        font-weight: bold;
        color: black;
    }

    .tab a:last-child {
        border-right: 1px solid #ccc;
    }

    .tab a:hover {
        background-color: #aaa;
        color: #fff;
    }

    .tab a.active {
        border-bottom: 2px solid #fff;
        cursor: default;
        background-color: #40826d;
        color: white;
        font-weight: bold;
    }

    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        margin: 0 auto 100px;
        padding: 35px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    .form p {
        text-align: left;
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #c4c4be;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;

    }

    .table {
        overflow: hidden;
        width: 100%;
        background-color: #fff;
        text-align: center;
        padding: 0 10 10 0;
    }

    .table-top thead th {
        background: #274f42;
        font-size: 16px;
        color: #fff;
        vertical-align: middle;
        font-weight: 400;
        text-transform: capitalize;
        line-height: 1;
        padding: 22px 40px;
        white-space: nowrap;
    }

    .table-rows tbody td {
        color: #808080;
        padding: 12px 40px;
        white-space: nowrap;
    }

    #red {
        color: red;
    }

    #blue {
        color: blue;
    }

    #green {
        color: green;
    }

    .process {
        color: #274f42;
    }

    .button {
        background-color: #484848;
        color: white;
    }

    .tabcontent {
        display: none;
    }

    #Prvi {
        display: block;
    }

    #add-button {
        text-align: center;
    }

    #add-transaction {
        color: #484848;
        font-weight: bold;
    }

    #add-transaction:hover {
        background-color: #40826d;
        font-weight: bold;
        color: white;
        border: #484848;
    }

    .button {
        background-color: #484848;
        color: white;
    }

    .del {
        font-size: 25px;
        color: red;
        font-weight: bold;
    }

    table td {
        vertical-align: middle;
    }

    table td:not([align]),
    table th:not([align]) {
        vertical-align: middle;
    }
</style>

@endsection