@extends('main') @section('title', '| All Posts')



@section('content')

    <div class="container">
        <br>
        <br>
        <br>
        <br>

        <h1>Profiel</h1>

        <div class="profiel">
            <div class="profiel-foto">

            </div>
            <div class="profiel-content">
                <p>{{$user->name}}</p>
                <p>{{$user->email}}</p>
                <p>
                    <a class="btn btn-success " href="{{ route('article.myarticles', $user->id) }}" role="button">Mijn munchies</a>
                    <a class="btn btn-warning " href="{{ route('article.index', $user->id) }}" role="button">Mijn transacties</a>
                </p>

            </div>
        </div>







    </div>

@stop