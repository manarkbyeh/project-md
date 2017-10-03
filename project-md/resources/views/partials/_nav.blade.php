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