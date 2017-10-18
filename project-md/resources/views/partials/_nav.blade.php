



<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand " href="/"><img class="logo" src="/images/logomd.png" alt="MUNCHDAILY"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">


    <ul class="navbar-nav ml-auto">
      <li class="nav-item" class="{{ Request::is('/') ? "active" : " " }}">
        <a class="nav-link" href="{{ url('/') }}"> HOME </a>
      </li>
      <li class="nav-item" class="{{ Request::is('/articles') ? "active" : " " }}">
        <a class="nav-link" href="{{ url('about') }}"> ABOUT </a>
      </li>
      <li class="nav-item" class="{{ Request::is('/articles') ? "active" : " " }}">
        <a class="nav-link" href="{{ url('werking') }}"> WERKING </a>
      </li>
  

              @if (!Auth::guest())
      <li class="nav-item" class="{{ Request::is('/articles') ? "active" : " " }}">
        <a class="nav-link" href="{{ url('articles') }}"> MUNCHIES </a>
      </li>


      @else
        <li class="nav-item dropdown" class="{{ Request::is('/articles') ? "active" : " " }}">
          <a class="nav-link dropdown-toggle" href="/articles" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            MUNCHIES
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ url('articles') }}">BEKIJK ALLE MUNCHIES</a>
            <a class="dropdown-item" href="{{ url('myarticles') }}">MIJN MUNCHIES</a>
            <a class="dropdown-item" href="{{ url('article/create') }}">VOEG EEN MUNCHIE TOE</a>
          </div>
        </li>
        @endguest




        <li class="nav-item" class="{{ Request::is('/user/{id}') ? "active" : " " }}">
          <a href="{{ url('/') }}"><img class="nav-link" src="{{ asset('images/search.png') }}" alt="SEARCH"></a>
        </li>






        @if (Auth::guest())
        <li class="nav-item dropdown" class="{{ Request::is('/login') ? "active" : " " }}">
         <li class="nav-item" class="{{ Request::is('/user/{id}') ? "active" : " " }}">

            <a href="{{ url('login') }}">AANMELDEN</a>
            </li>
            <li class="nav-item" class="{{ Request::is('/user/{id}') ? "active" : " " }}">

            <a href="{{ url('register') }}">REGISTREREN</a>
        </li>

        @else

        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
{{ Auth::user()->name }} <span class="caret"></span>
</a>

        <ul class="dropdown-menu" role="menu">
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
Logout
</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
        </ul>

      </li>


      @endif


        

           


    </ul>
    {{-- <form class="form-inline my-2 my-lg-0">
       <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
       <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
     </form>--}}
  </div>
</nav>