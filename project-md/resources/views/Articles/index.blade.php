@extends('main') @section('title', '| Create New Post') @section('content')

<h1 class="my-4">Home<small> page</small></h1>
<!-- Blog Post -->
@foreach($articles as $n)
<div class="card mb-4">
  <img class="card-img-top" src="{{url('/images/'.$n->pic)}}" alt="Card image cap" style="width: 100%;height: 300px">
  <div class="card-body">
    <h2 class="card-title">{{$n->title}}</h2>
    <p class="card-text">{{strip_tags($n->text)}}</p>
    <a href="{{url('/article/'.$n->id)}}" class="btn btn-primary">Read More &rarr;</a> @if(Auth::check())
    <a href="{{url('/article/transaction/'.$n->id)}}" class="btn btn-success">Order &rarr;</a> @endif
  </div>
  <div class="card-footer text-muted">
    Posted on {{ date('M j, Y h:ia', strtotime($n->created_at)) }} by

  </div>
</div>
@endforeach @endsection