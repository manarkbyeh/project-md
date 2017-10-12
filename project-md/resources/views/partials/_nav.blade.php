



<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="/"><img src="../../../public/images/logomd.png" alt="MUNCHDAILY"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item" class="{{ Request::is('/') ? "active" : " " }}">
        <a class="nav-link" href="/"> HOME </a>
      </li>
      <li class="nav-item" class="{{ Request::is('/articles') ? "active" : " " }}">
        <a class="nav-link" href="/articles"> MUNCHIES </a>
      </li>



      @guest
      <li class="nav-item" class="{{ Request::is('/login') ? "active" : " " }}">
        <a class="nav-link" href="/login"> AANMELDEN </a>
      </li>
      <li class="nav-item" class="{{ Request::is('/register') ? "active" : " " }}">
        <a class="nav-link" href="/register"> REGISTREER </a>
      </li>

      @else
        <li class="nav-item" class="{{ Request::is('/user/{id}') ? "active" : " " }}">
          <a class="nav-link" href="/user/{id}"> PROFIEL </a>
        </li>
        @endguest



    </ul>
    {{-- <form class="form-inline my-2 my-lg-0">
       <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
       <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
     </form>--}}
  </div>
</nav>