@extends('app')

@section('pageTitle', 'Dodaj novu biljku')

@section('content')
<div class="container">
<div id="ticket" class="ticket">
            <!--Treba li ovdje id ticket ako nije nigdje definiran id?-->
            <div class="tab">
                <a class="tablinks" onclick="Switch(event, 'Prvi')">Kupovina</a>
                <!--klasa tablinks nije definirana?-->
                <a class="tablinks" onclick="Switch(event, 'Drugi')">Prodaja</a>
                <a class="tablinks" onclick="Switch(event, 'Treci')">Plan nabave</a>
            </div>

            <div class="form">
                <!--Prvi za overview i ispis?-->
                <div id="Prvi" class="tabcontent">
                    <!--Treba li id ako nije definiran? i klase nema-->
                    <table class="table table-top">
                        <thead>
                            <tr>
                                <th>DATUM</th>
                                <th>ARTIKAL</th>
                                <th>KOLIČINA</th>
                                <th>CIJENA</th>
                                <!--Ovo je cijena po jedinici/kg-->
                                <th>UKUPNO</th>
                                <th>STATUS</th>
                                <!--naruceno, gotovo, otkazano-->
                            </tr>
                        </thead>
                        <tbody>
                            <!--Testni redak u tablici-->
                            <tr>
                                <td>15.06.2021.</td>
                                <td>Jabuka</td>
                                <td>3kg</td>
                                <td>3</td>
                                <td>9</td>
                                <td id="blue">Naruceno</td>
                            </tr>
                            <tr>
                                <td>10.06.2021.</td>
                                <td>Višnja</td>
                                <td>10kg</td>
                                <td>5</td>
                                <td>50</td>
                                <td id="green">Gotovo</td>
                            </tr>
                            <tr>
                                <td>11.06.2021.</td>
                                <td>Jabuka</td>
                                <td>3kg</td>
                                <td>3</td>
                                <td>9</td>
                                <td id="red">Otkazano</td>
                            </tr>
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
                                <!--Ovo je cijena po jedinici/kg-->
                                <th>UKUPNO</th>
                                <th>STATUS</th>
                                <!--naruceno, gotovo, otkazano-->
                            </tr>
                        </thead>
                        <tbody>
                            <!--Testni redak u tablici-->
                            <tr>
                                <td>15.06.2021.</td>
                                <td>Jabuka</td>
                                <td>3kg</td>
                                <td>3</td>
                                <td>9</td>
                                <td id="blue">Naruceno</td>
                            </tr>
                            <tr>
                                <td>10.06.2021.</td>
                                <td>Višnja</td>
                                <td>10kg</td>
                                <td>5</td>
                                <td>50</td>
                                <td id="green">Prodano</td>
                            </tr>
                            <tr>
                                <td>11.06.2021.</td>
                                <td>Jabuka</td>
                                <td>3kg</td>
                                <td>3</td>
                                <td>9</td>
                                <td id="green">Prodano</td>
                            </tr>
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
                                <!--Ovo je cijena po jedinici/kg-->
                                <th>UKUPNO</th>
                                <th>STATUS</th>
                                <!--naruceno, gotovo, otkazano-->
                            </tr>
                        </thead>
                        <tbody>
                            <!--Testni redak u tablici-->
                            <tr>
                                <td>15.06.2021.</td>
                                <td>Jabuka</td>
                                <td>3kg</td>
                                <td>3</td>
                                <td>9</td>
                                <td id="green">Naruceno</td>
                            </tr>
                            <tr>
                                <td>10.06.2021.</td>
                                <td>Višnja</td>
                                <td>10kg</td>
                                <td>5</td>
                                <td>50</td>
                                <td id="blue">Planirano</td>
                            </tr>
                            <tr>
                                <td>11.06.2021.</td>
                                <td>Jabuka</td>
                                <td>3kg</td>
                                <td>3</td>
                                <td>9</td>
                                <td id="blue">Planirano</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>

                <a class="button" href="transakcije_add.html">
                    DODAJ
                </a>
                
            </div>

        </div>
</div>
<style scoped>
    .ticket {
        position: relative;
        max-width: 1000px;
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
        max-width: 1000px;
        margin: 0 auto 100px;
        padding: 45px;
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

    #prvi {
        display: block;
    }

    /*za sve str*/
    body {
        font-family: 'Roboto', sans-serif;
    }

    .navbar-item {
        color: white;
    }

    #viridian {
        background-color: #40826d;
        color: white;
        font-weight: bold;
    }

    #viridian a:hover {
        color: #274f42;
        text-shadow: 2px 2px 5px #274f42;
    }

    /*za sve str*/
    .artikl {
        text-align: left;
        width: 1000px;
        max-width: 100%;
        max-height: 100%;
        padding: 8% 0 0;
        margin: auto;
        position: relative;
    }

    .box {
        max-width: 100%;
        max-height: 100%;
        height: 200px;
        width: 900px;
    }

    .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
    }

    .home-radio input {
        width: auto;
        margin: 10px;
    }

    .radijo {
        text-align: center;
    }


    .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #40826d;
        width: 100%;
        border: 0;
        padding: 25px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
        border: 2px solid black;
    }

    .form button:hover,
    .form button:active,
    .form button:focus {
        background: #40826d;
    }

    .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
    }

    .form .message a {
        color: #40826d;
        text-decoration: none;
    }

    .form .register-form {
        display: none;
    }


    .error-message {
        display: block;
        padding-bottom: 10px;
        color: red;
    }
</style>