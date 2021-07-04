@extends('app')

@section('pageTitle', 'Dodaj novog kupca')

@section('content')
<div class="container">
    <div id="login" class="login-page">
        <div class="form">
            <form class="login-form" action="/dodaj-kupca" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="label" for="ime">Ime:
                    <input class="input is-success" id="ime" type="text" placeholder="Ime" required />
                </label>
                <label class="label" for="adresa">Adresa:
                    <input class="input is-success" id="adresa" type="text" placeholder="Adresa" required />
                </label>
                <label class="label" for="tip">Tip kupca:
                    <br>
                    <br>
                    <select name="tip" id="tip">
                        <option value="jedan">Pojedinac</option>
                        <option value="vise">Tvrtka</option>
                    </select>
                </label>
                <br>
                <br>
                <div>
                    <input class="button is-center is-link is-success" id="butAdd" type="submit" value="Dodaj biljku" />
                </div>
                <br>
                <div>
                    <input class="button is-center is-link is-danger" id="butCan" type="submit" value="Cancel" />
                </div>
            </form>
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

    .tabcontent {
        display: none;
    }

    #prvi {
        display: block;
    }
</style>

<style scoped>
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
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
@endsection