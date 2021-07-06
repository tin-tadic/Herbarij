@extends('app')

@section('pageTitle', 'Dodaj transakcije')

@section('content')
<section id="first" class="hero is-large is-dark">
  <div class="hero-body">
    <h1 class="title">
      O NAMA
    </h1>
    <h3 class="subtitle">
      Tko smo i što je naš projekt
    </h3>
  </div>
</section>

<section id="second" class="hero2">
  <div class="hero2-body">
    <div id="arrow-container">
        <span id="arrow">&#11015;</span>
    </div>
    <p id="hdln" class="blockify">Mi smo studenti treće godine računarstva na Fakultetu strojarstva, računarstva i elektrotehnike.</p>
    <br>
    <p class="blockify">Naš tim se sastoji od:</p>
  </div>
</section>

<section id="second" class="hero3">
  <div class="hero3">
  </div>
</section>

<style scoped>
.hero{
    background-image: url("https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
    background-size: cover;
}
.title, .subtitle{
    text-align:center;
    text-shadow: 2px 1px grey;
}
.hero2{ /*uzet css direktno iz bulme jer je bilo potrebno još hero-a a uređivanje bilo komplicirano*/
    flex-grow: 1;
  flex-shrink: 1;
  align-items: center;
  display: flex;
  padding: 9rem 1.5rem;
  background-image: linear-gradient(141deg, #1f191a 0%, #363636 71%, #46403f 100%);
  background-image: linear-gradient(141deg, #1f191a 0%, #363636 71%, #46403f 100%);
  background-color: #fff;
  border-color: #fff;
  color: #363636;
  background-color: #363636;
  color: #fff;
  align-items: stretch;
  flex-direction: column;
  justify-content: space-between;
  position:relative;
}
.hero2-body{
    align-items: center;
  flex-grow: 1;
  flex-shrink: 0;
  padding: 3rem 1.5rem;
}
#second{
    border-top: groove #40826d 5px;
}
p.blockify{
    display:block;
    font-size:20px;
    text-align:center;
}
#hdln{
    font-weight:bold;
}
#arrow-container{
    margin:auto;
    width:200px;
}
#arrow{
    position: absolute;
    top:-2%;
    left: 50%;
    color: #40826d;
    font-size:50px;
    font-weight:bolder;
    text-align:center;
}
.hero3{
    width:100%;
    height:200px;
    background-image: url("storage\app\public\assets\2902348.jpg");

}
</style>

@endsection