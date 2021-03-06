<div class="mojContainer ">
        <!--navbar-->
        <nav id="viridian" class="navbar is-transparent is-fixed-top is-spaced has-shadow mrgnt" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="">
            <img src="/storage/assets/sprout (1).png" height="28">
            </a>
    
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            </a>
        </div>
    
        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
            <a class="navbar-item" href="{{ route('home') }}">
                Naslovna
            </a>
    
            <a class="navbar-item" href="{{ route('aboutUs') }}">
                O nama
            </a>
    
            <a class="navbar-item" href="{{ route('getPlants') }}">
                Biljke
            </a>

            <a class="navbar-item" href="{{ route('viewTransactions') }}">
                Transakcije
            </a>

            <a class="navbar-item" href="{{ route('getBuyers') }}">
                Kupci
            </a>

            <a class="navbar-item" href="{{ route('lookForPlanter') }}">
                Rasadnici
            </a>
    
            <!-- ovaj dio je za drop down meni, nije potreban?
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                More
                </a>
        
                <div class="navbar-dropdown">
                <a class="navbar-item">
                    About
                </a>
                <a class="navbar-item">
                    Jobs
                </a>
                <a class="navbar-item">
                    Contact
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item">
                    Report an issue
                </a>
                </div>
            </div>-->
            </div>
    
            <div class="navbar-end">
                <div id="messages-div">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                
                    @if ($message = Session::get('warning'))
                        <div class="alert alert-warning alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                
                    @if ($message = Session::get('info'))
                        <div class="alert alert-info alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        </nav>
    <!--kraj navbar-a-->
</div>
<style scoped>
  /*za sve str*/
  body {
    font-family: 'Roboto', sans-serif;
  }
  nav{
      max-width:100%;
  }
  .navbar-item {
    color: white;
    font-family: 'Poppins', sans-serif;
    font-size: 22px;
  }

  #viridian {
    background-color: #40826d;
    color: white;
    font-weight: bold;
    max-width:100%;
  }

  #viridian a:hover {
    color: #274f42;
    text-shadow: 2px 2px 5px white;
  }
  #mojContainer{
      max-width:100%;
  }
  .mrgnt{
  margin-bottom:15px;
}
</style>