<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  @include('partials._head')
</head>

<body>


<<<<<<< HEAD
  <div id="wrapper" class="toggled">


    @include('partials._nav')
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
=======


    </div> <!-- end of .container -->
    @include('partials._footer')
        @include('partials._javascript')
>>>>>>> 17fcf238a4bb2fe41b5cddd28d8c6be59a0251cf

            @include('partials._messages') @yield('content')
          </div>
          <div class="col-md-4">

<<<<<<< HEAD


          </div>
        </div>

      </div>
    </div>

  </div>

  {{-- @include('partials._footer') --}} @include('partials._javascript') @yield('scripts')

</body>

</html>
=======
  </body>
</html>



>>>>>>> 17fcf238a4bb2fe41b5cddd28d8c6be59a0251cf
