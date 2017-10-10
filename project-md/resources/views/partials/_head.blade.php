<meta charset="UTF-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width,initial-scale=1" name="viewport">
<meta content="Page description" name="description">
<meta name="google" content="notranslate" />
<meta content="Mashup templates have been developped by Orson.io team" name="author">
<meta name="msapplication-tap-highlight" content="no">
<link href="./assets/apple-icon-180x180.png" rel="apple-touch-icon">
<link href="./assets/favicon.ico" rel="icon">
<meta name="csrf-token" content="{{ csrf_token() }}"> {!! Html::style('css/bootstrap.min.css') !!} {!! Html::style('css/simple-sidebar.css') !!}


<title>{{ config('app.name', 'Laravel') }} @yield('title')</title>





<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

<style>
  body {
    padding-top: 4%;
  }
  
  .container {
    margin-top: 3%;
  }
  
  .jumbotron h1,
  .jumbotron p {
    text-align: center;
  }
  
  .billboard {
    background-image: url("../../../public/images/hpfoto.jpeg");
    margin-bottom: 0;
    min-height: 50%;
    background-repeat: no-repeat;
    background-position: center;
    -webkit-background-size: cover;
    background-size: cover;
  }
  
  .btn {
    color: #FFFFFF;
  }
  
  .bg-dark {
    background-color: #000000!important;
  }
</style>