@extends('main') @section('title', '| View Article') @section('content')

<!-- Title -->
<h1 class="mt-4">{{$articles->title}}</h1>

<!-- Author -->
<p class="lead">

</p>

<hr>

<!-- Date/Time -->
<p>Posted on {{ date('M j, Y h:ia', strtotime($articles->created_at)) }}</p>

<hr>

<!-- Preview Image -->
<img class="img-fluid rounded" src="{{url('/images/'.$articles['pic'])}}" alt="">

<hr>

<!-- Post Content -->
<p class="lead">{{strip_tags($articles->text)}} </p>
<hr> @endsection