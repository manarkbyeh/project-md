



<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand " href="{{url('/')}}"><img class="logo" src="{{asset('/images/logomd.png')}}" alt="MUNCHDAILY"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">


        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{url('/')}}"> Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{url('about')}}"> About </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ Request::is('werking') ? 'active' : '' }}" href="{{url('werking')}}"> Werking </a>
            </li>


            @guest
            <li class="nav-item ">
                <a class="nav-link {{ Request::is('/articles') ? "active" : "" }}" href="{{url('/articles')}}"> Munchies </a>
            </li>


            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('/articles') ? "active" : " " }}" href="/articles" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Munchies
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{url('/articles')}}">Bekijk alle munchies</a>
                    </div>
                </li>
                @endguest







                @guest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('/login') ? "active" : " " }}" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{url('/login')}}">Aanmelden</a>

                        <a class="dropdown-item" href=" {{url('/register')}}">Registreren</a>
                    </div>
                </li>

                @else

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::is('user/'. Auth::user()->id) ? "active" : " " }}" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{route('user.profile',Auth::user()->id)}}">Mijn profiel</a>

                            <a class="dropdown-item" href="{{url('/myarticles')}}">Mijn munchies</a>

                            <a class="dropdown-item" href="{{url('/myorders')}}">Mijn verzoeken</a>
                            <a class="dropdown-item" href="{{url('/article/create')}}">Voeg een munchie toe</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">Afmelden</a>
                        </div>
                    </li>


                    @endguest


                    <li class="nav-item">
                    <form action="{{url('/article/search')}}"  class="form-inline"  method="post">
                            {!! csrf_field() !!}
                            <input class="form-control" name="search" type="text" placeholder="ik ben op zoek naar...">
                            <button type="submit"  class="btn btn-success my-2 my-sm-0">ZOEKEN</button>
                        </form>

                    </li>
                  





        </ul>
        {{-- <form class="form-inline my-2 my-lg-0">
           <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
           <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
         </form>--}}
    </div>
</nav>