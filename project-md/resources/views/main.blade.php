<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  @include('partials._head')
</head>

<body>


  <div id="wrapper" class="toggled">


    @include('partials._nav')
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">

            @include('partials._messages') @yield('content')
          </div>
          <div class="col-md-4">



          </div>
        </div>

      </div>
    </div>

  </div>

  {{-- @include('partials._footer') --}} @include('partials._javascript') @yield('scripts')

</body>

</html>