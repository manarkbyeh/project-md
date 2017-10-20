



<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand " href="/"><img class="logo" src="../images/logomd.png" alt="MUNCHDAILY"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">


        <ul class="navbar-nav ml-auto">
            <li class="nav-item" class="{{ Request::is('/') ? "active" : " " }}">
                <a class="nav-link" href="{{url('/home')}}"> HOME </a>
            </li>
            <li class="nav-item" class="{{ Request::is('/articles') ? "active" : " " }}">
                <a class="nav-link" href="{{url('/about')}}"> ABOUT </a>
            </li>
            <li class="nav-item" class="{{ Request::is('/articles') ? "active" : " " }}">
                <a class="nav-link" href="{{url('/werking')}}"> WERKING </a>
            </li>
            

            @guest
            <li class="nav-item" class="{{ Request::is('/articles') ? "active" : " " }}">
                <a class="nav-link" href="{{url('/articles')}}"> MUNCHIES </a>
            </li>


            @else
                <li class="nav-item dropdown" class="{{ Request::is('/articles') ? "active" : " " }}">
                    <a class="nav-link dropdown-toggle" href="/articles" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        MUNCHIES
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{url('/articles')}}">BEKIJK ALLE MUNCHIES</a>
                      
                        <a class="dropdown-item" href="{{url('/myarticles')}}">MIJN MUNCHIES</a>
                    
                        <a class="dropdown-item" href="{{url('/myorders')}}">MIJN BESTELLING</a>
                        <a class="dropdown-item" href="{{url('/article/create')}}">VOEG EEN MUNCHIE TOE</a>
                    </div>  
                </li>
                @endguest




                <li class="nav-item" class="{{ Request::is('/user/{id}') ? "active" : " " }}">
                    <a href="/"><img class="nav-link" src="images/search.png" alt="SEARCH"></a>
                </li>
          





                @guest
                <li class="nav-item dropdown" class="{{ Request::is('/login') ? "active" : " " }}">
                    <a class="nav-link dropdown-toggle" href="/login" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="nav-link" href="{{url('/user/{id}')}}" src="/images/avatar.png" alt="PROFIEL">
                     
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{url('/login')}}">AANMELDEN</a>
                       
                        <a class="dropdown-item" href=" {{url('/register')}}">REGISTREREN</a>
                    </div>
                </li>

                @else
              
                    <li class="nav-item dropdown" class="{{ Request::is('/user/{id}') ? "active" : " " }}">
                        <a class="nav-link dropdown-toggle" href="{{url('/user/{id}')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="nav-link" href="{{url('/user/{id}')}}" src="/images/avatar.png" alt="PROFIEL">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{route('user.profile',Auth::user()->id)}}">MIJN PROFIEL</a>
                          
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">AFMELDEN</a>
                        </div>
                    </li>


                    @endguest





        </ul>
        {{-- <form class="form-inline my-2 my-lg-0">
           <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
           <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
         </form>--}}
    </div>
</nav>