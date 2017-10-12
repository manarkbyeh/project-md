<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  @include('partials._head')
</head>

<body>

@include('partials._nav')


@include('partials._messages')

@yield('content')



<!-- end of .container -->
@include('partials._footer')
@include('partials._javascript')

@yield('scripts')

</body>
</html>


