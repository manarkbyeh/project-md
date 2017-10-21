<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  @include('partials._head')
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.10&appId=147178709350851';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

@include('partials._nav')


@include('partials._messages')

@yield('content')



<!-- end of .container -->
@include('partials._footer')
@include('partials._javascript')

@yield('scripts')

</body>
</html>


