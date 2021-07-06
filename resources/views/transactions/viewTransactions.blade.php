@extends('app')

@section('pageTitle', 'Pregledaj transakcije')

@section('content')
<div class="container">

    <div id="add-button">
        <button class="button is-success is-outlined">Add Transaction</button>
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
                    <table class="table table-top">
                        <thead>
                            <tr>
                                <th>DATUM</th>
                                <th>ARTIKAL</th>
                                <th>KOLIČINA</th>
                                <th>CIJENA</th>
                                <th>STATUS</th>
                                <th>EDIT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kupovine as $kupovina)
                            <tr>
                                <td>{{ date('d-m-Y', strtotime($kupovina->datum)) }}</td>

                                <td>{{ $kupovina->artikl }}</td>

                                <td>{{ $kupovina->kolicina }}</td>

                                <td>{{ round($kupovina->cijena, 2) }}</td>
                                
                                @if ($kupovina->stanje == 0)
                                    <td id="blue">Naruceno</td>
                                @elseif ($kupovina->stanje == 1)
                                    <td id="green">Gotovo</td>
                                @else
                                    <td id="red">Otkazano</td>
                                @endif
                                
                               
                                <td><button class="button is-light">Edit</button></td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    
                </div>
                <!--Drugi za pregled statusa transakcija-->
                <div id="Drugi" class="tabcontent">
                    <table class="table table-top">
                        <thead>
                            <tr>
                                <th>DATUM</th>
                                <th>ARTIKAL</th>
                                <th>KOLIČINA</th>
                                <th>CIJENA</th>
                                <th>STATUS</th>
                                <th>EDIT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transakcije as $transakcija)
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($transakcija->datum)) }}</td>

                                    <td>{{ $transakcija->artikl }}</td>

                                    <td>{{ $transakcija->kolicina }}</td>

                                    <td>{{ round($transakcija->cijena, 2) }}</td>
                                    
                                    @if ($transakcija->stanje == 0)
                                        <td id="blue">Naruceno</td>
                                    @elseif ($transakcija->stanje == 1)
                                        <td id="green">Gotovo</td>
                                    @else
                                        <td id="red">Otkazano</td>
                                    @endif
                                    
                                
                                    <td><button class="button is-light">Edit</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
             
                </div>
                <!--Treba li treci uopce?-->
                <div id="Treci" class="tabcontent">
                    <table class="table table-top">
                        <thead>
                            <tr>
                                <th>DATUM</th>
                                <th>ARTIKAL</th>
                                <th>KOLIČINA</th>
                                <th>CIJENA</th>
                                <th>STATUS</th>
                                <th>EDIT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nabave as $nabava)
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($nabava->datum)) }}</td>

                                    <td>{{ $nabava->artikl }}</td>

                                    <td>{{ $nabava->kolicina }}</td>

                                    <td>{{ round($nabava->cijena, 2) }}</td>
                                    
                                    @if ($nabava->stanje == 0)
                                        <td id="blue">Naruceno</td>
                                    @elseif ($nabava->stanje == 1)
                                        <td id="green">Gotovo</td>
                                    @else
                                        <td id="red">Otkazano</td>
                                    @endif
                                                                    
                                    <td><button class="button is-light">Edit</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 
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
    .container{
        margin-top:100px;
    }
    .ticket {
        position: relative;
        max-width: 1500px;
        /* padding: 8% 0 0;*/
        margin: auto;
    }

    #ticket {
        padding-top: 0px;
    }

    .tab {
        overflow: hidden;
        margin-left: 20px;
        padding: 8% 0 0;
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
    .tabcontent{
        display:none;
    }
    #Prvi{
        display:block;
    }
    #add-button{
        float:right;
        margin-right:2%;
        margin-top:1.5%;
    }
    #add-button .button{
        color:#484848;
    }
</style>

@endsection
