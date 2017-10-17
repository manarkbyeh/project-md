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
                <h2>FOTO</h2>
            </div>
            <div class="profiel-content">
                <p>{{$user->name}}</p>
                <p>{{$user->email}}</p>
            </div>
        </div>

        <div class="mijn-munchies">
            <h2>Mijn munchies</h2>
            <a class="btn btn-success" href="{{ route('article.index', $user->id) }}" role="button">TOEVOEGEN</a>


        </div>

       <div class="mijn-verzoeken">
           <h2>Mijn verzoeken</h2>
       </div>






    </div>

@stop