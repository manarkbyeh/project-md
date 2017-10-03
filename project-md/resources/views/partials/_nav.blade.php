<<<<<<< HEAD
<div id="sidebar-wrapper" style="background-color: #292D3E">
  <ul class="sidebar-nav">
    <li class="sidebar-brand">
      <a href="{{url('/article')}}">
{{ config('app.name', 'Laravel') }}
</a>
    </li>
    @guest
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('register') }}">Register</a></li>
    @else
    <h3 class="h3" style="color: #fff;margin-left: 10px">hi,{{ Auth::user()->name }}</h3>

    <li><a href="{{url('/article')}}" title="">Home</a></li>
    <li><a href="{{url('/myarticles')}}" title="">My Articles </a></li>
    <li><a href="{{url('/article/create')}}" title="">Add Article </a></li>
    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
Logout
</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
    </li>
    @endguest
  </ul>
</div>
=======




<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="/">DailyMunch</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item" class="{{ Request::is('/') ? "active" : " " }}">
        <a class="nav-link" href="/"> Home </a>
      </li>
      <li class="nav-item" class="{{ Request::is('/articles') ? "active" : " " }}">
        <a class="nav-link" href="/articles"> Article </a>
      </li>



          @guest
            <li class="nav-item" class="{{ Request::is('/login') ? "active" : " " }}">
              <a class="nav-link" href="/login"> Login </a>
            </li>
            <li class="nav-item" class="{{ Request::is('/register') ? "active" : " " }}">
              <a class="nav-link" href="/register"> Register </a>
            </li>

          @else
            <li class="nav-item" class="{{ Request::is('/user/{id}') ? "active" : " " }}">
              <a class="nav-link" href="/user/{id}"> Profile </a>
            </li>
          @endguest



    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
>>>>>>> 17fcf238a4bb2fe41b5cddd28d8c6be59a0251cf
