@extends('app')

@section('pageTitle', 'O nama')

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

<section class="part3">
  <div class="part3-body">
  <div class="nestoMargina">
  <div class="naslovi">
    <h1>Frontendaša</h1>
  </div>
  <div id="front">
      <div class="mini">
        <h2>Gabrijela Josipović</h2>
        <img class="profile" src="storage/assets/user.png" height=256 width=128/>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras interdum, purus ac mattis dictum, nisl sapien convallis arcu, sit amet fermentum orci est eu ex. Pellentesque euismod magna id interdum fringilla. Vivamus vel fringilla erat. Nunc a convallis tortor. Sed posuere varius efficitur. In id ultricies nunc. Suspendisse eleifend,</p>
      </div>
      <div class="mini">
        <h2>Marin Azinović</h2>
        <img class="profile" src="https://images.pexels.com/photos/1933873/pexels-photo-1933873.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" height=256 width=128/>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras interdum, purus ac mattis dictum, nisl sapien convallis arcu, sit amet fermentum orci est eu ex. Pellentesque euismod magna id interdum fringilla. Vivamus vel fringilla erat. Nunc a convallis tortor. Sed posuere varius efficitur. In id ultricies nunc. Suspendisse eleifend,</p>
      </div>
      <div class="mini">
        <h2>Danica Jurić</h2>
        <img class="profile" src="https://images.pexels.com/photos/3680316/pexels-photo-3680316.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" height=256 width=128/>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras interdum, purus ac mattis dictum, nisl sapien convallis arcu, sit amet fermentum orci est eu ex. Pellentesque euismod magna id interdum fringilla. Vivamus vel fringilla erat. Nunc a convallis tortor. Sed posuere varius efficitur. In id ultricies nunc. Suspendisse eleifend,</p>
      </div>
    </div>
  </div>
  <!--BACKEND-->
  <div id="razdvoji"></div>
  <div class="nestoMargina">
  <div class="naslovi">
    <h1>Backendaša</h1>
  </div>
  <div id="front">
      <div class="mini">
        <h2>Tin Tadić</h2>
        <img class="profile" src="https://images.pexels.com/photos/5911942/pexels-photo-5911942.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" height=256 width=128/>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras interdum, purus ac mattis dictum, nisl sapien convallis arcu, sit amet fermentum orci est eu ex. Pellentesque euismod magna id interdum fringilla. Vivamus vel fringilla erat. Nunc a convallis tortor. Sed posuere varius efficitur. In id ultricies nunc. Suspendisse eleifend,</p>
      </div>
      <div class="mini">
        <h2>Ankica Katić</h2>
        <img class="profile" src="/storage/assets/ankicaProfilna.jpeg" height=256 width=128/>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras interdum, purus ac mattis dictum, nisl sapien convallis arcu, sit amet fermentum orci est eu ex. Pellentesque euismod magna id interdum fringilla. Vivamus vel fringilla erat. Nunc a convallis tortor. Sed posuere varius efficitur. In id ultricies nunc. Suspendisse eleifend,</p>
      </div>
    </div>
  </div>
    
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
#hdln, .naslovi{
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
.part3{
  border-top: groove #40826d 5px;
    width:100%;
    
    /*background-image: url("https://images.pexels.com/photos/807598/pexels-photo-807598.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
    background-image: url("");*/
    background-image: url("https://images.pexels.com/photos/2097521/pexels-photo-2097521.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
    background-size:cover;
}
#front{  
  padding-top:1%;
  display:flex;
  width:80%;
  margin:auto;
  justify-content: space-evenly;
}
.mini{
  width:28%;
  margin:auto;
  background-color: white;
  background:rgba(255,255,255, 0.6);
  display:inline-block;
  justify-content: space-evenly;
  padding: 20px;
  border-radius:10px;
  text-align:center;
}
.mini h2{
  font-size: 25px;
  font-weight: 600;
  
  font-family: 'Montserrat', sans-serif;
}
.naslovi{
  margin: 25px;
  display:block;
  text-align: center;
  font-weight:900;
  font-size: 50px;
  font-family: 'Montserrat', sans-serif;
  letter-spacing: 4px;
}
.naslovi h1{
  font-weight: 700;
  text-shadow: white 1px 1px;
}
.profile{
  margin:auto;
  border: solid 0.5px #40826d;
}
#razdvoji{
  margin:auto;
  margin-top:30px;
  margin-bottom:30px;
  width:65%;
  border-top: double 4px white;
}
.nestoMargina{
  margin-bottom:5%;
}
</style>

@endsection