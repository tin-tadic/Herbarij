@extends('app')

@section('pageTitle', 'Home')

@section('content')

<div class="mojContainer">
<section class="hero is-fullheight">
  <div class="hero-body">
    <!--<div class="">
        <div class="tile">
            <p>Welcome to our front page!</p>
        </div>-->
        
    </div>
  </div>
</section>
</div>
<style>
.mojContainer{
    /*ova slika je na internetu
    background-image: url("https://images.unsplash.com/photo-1574320377594-45b10b980bed?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1965&q=80");
    liszici: https://cdn.pixabay.com/photo/2015/06/02/03/20/vegetable-plot-794571_960_720.jpg
    top view https://images.unsplash.com/photo-1465541064977-5a2d76b09f1f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=667&q=80
    */
    background-image: url("https://cdn.pixabay.com/photo/2015/06/02/03/20/vegetable-plot-794571_960_720.jpg");
    background-position: center center;
    background-repeat:  no-repeat;
    background-attachment: fixed;
    background-size:  cover;
}
.tile{
   padding:30px;
   opacity:70%;
   border-radius: 10px;
   background-color:white;
   font-size: 30px;
   font-weight: bold;
   color:black;
}
</style>