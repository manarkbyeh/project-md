@extends('main') @section('title', '| All Posts')



@section('content')

    <h1>Profile</h1>

    <h2>FOTO</h2>
    <p>{{$user->name}}</p>
    <p>{{$user->email}}</p>



    <p><a class="btn btn-success" href="{{ route('article.index', $user->id) }}" role="button">Mijn artikels</a>
    <a class="btn btn-warning" href="{{ route('article.index', $user->id) }}" role="button">Mijn transacties</a></p>


@stop