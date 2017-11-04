@extends('main') @section('title', '| Mijn profiel')



@section('content')

    <div class="container extra">

        <h1 class="orange">Profiel</h1>


        <div class="profiel">

            <div class="profiel-content">
                <div class="profiel-foto">
                    <img src="/images/{{$user->pic}}" alt="">
                </div>
                <p>{{$user->name}}</p>
                <p>{{$user->email}}</p>
                <p>
                    <a class="btn btn-success " href="{{ route('article.myarticles', $user->id) }}" role="button">Mijn munchies</a>
                    <a class="btn btn-warning " href="{{ route('article.myOrders', $user->id) }}" role="button">Mijn transacties</a>
                </p>

            </div>


        </div>







    </div>

@stop