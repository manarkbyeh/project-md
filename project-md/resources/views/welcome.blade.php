@extends('main') @section('title', '')

<!-- Main jumbotron for a primary marketing message or call to action -->
<section id="hero">
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Welkom bij MunchDaily!</h1>
            <h5>MunchDaily geeft de mogelijkheid om het teveel aan voedsel aan iemand anders te schenken.</h5>
            <p><a class="btn btn-success btn-lg btn-hero" href="{{ route('article.create') }}" role="button">GEVEN</a>
                <a class="btn btn-warning btn-lg btn-hero" href="{{ route('article.index') }}" role="button">ONTVANGEN</a></p>
        </div>
    </div>
</section>


@section('content')


    <section id="doel-icons">
        <div class="container">
            <div class="all-icons">
                <div class="icon-wrapper ">
                    <a href="/">
                        <img src="images/waste.png" alt="" class="icon">
                        <h4>Stop voedselverspilling</h4>
                    </a>
                </div>

                <div class="icon-wrapper">
                    <a href="/">
                        <img src="images/world.png" alt="" class="icon">
                        <h4>Zorg voor het milieu</h4>
                    </a>
                </div>

                <div class="icon-wrapper">
                    <a href="/">
                        <img src="images/family.png" alt="" class="icon">
                        <h4>Maak anderen blij</h4>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <section id="doel-text">
        <div class="container">
        <h5>"Bij MunchDaily zijn wij er van overtuigd dat het voedsel dat je weg wil gooien, een betere plek 
        verdient bij iemand anders. Door de mogelijkheid te creëren om eten weg te geven, proberen we
            voedselverspilling tegen te gaan.
        </h5>
        <h5>Word ook lid en schenk je overschotten aan anderen, die dit wel nodig hebben. Zo help je mee
        de wereld een betere plek te maken. Niet enkel de ontvanger, maar ook het milieu zal je dankbaar zijn!
        </h5>

            <div class="text-center">
                <p><a class="btn btn-warning btn-lg" href="#" role="button">LID WORDEN</a>

            </div>
        </div>
    </section>



    <section id="vandaag">
        <div class="container">
            <h1 class="orange" id="search">Deze munchies zijn bijna weg!</h1>
            <!-- Example row of columns -->

            <div class="row">

                @foreach($articles as $article)
                <div class="col-md-4">
                <a href="{{url('/article/'.$article->id)}}">
                        <div class="artikel">
                            <div class="foto">
                                <img src="{{asset('/images/'.$article->pic)}}" alt="munchie">
                            </div>
                            <div class="artikel-content">
                                <p class="datum">{{$article->datum}}</p>
                                <h2>{{ (strlen($article->title)>15) ? substr(strip_tags($article->title), 0, 15).'...' :strip_tags($article->title)}}</h2>
                                
                                <p>{{ (strlen($article->text)>60) ? substr(strip_tags($article->text), 0, 60).'...' :strip_tags($article->text)}}</p>
                                <p class="datum_locatie">{{$article->tijdstip}}
                                
                                 <strong>
                                 {{ (strlen($article->locatie)>10) ? substr($article->locatie, 0, 10).'...' :$article->locatie}}</strong>
                                 </p>
                         
                @if(Auth::check() && (Auth::user()->id != $article->user_id))
    <a href="{{url('/article/transaction/'.$article->id)}}" class="btn btn-success">VERZOEK</a> @endif
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

                


            </div>

                <div class="text-center">
                    <p><a class="btn btn-warning btn-lg" href="{{ route('article.index') }}" role="button">BEKIJK ALLE MUNCHIES</a></p>
                </div>

        </div>
    </section>

    <section id="categorie">
        <div class="container">
            <div class="all-icons">

                @foreach($categories as $category)
                <div class="icon-wrapper ">
               
                    <a href="{{ url('article/category/'.$category->id) }}">
                       

                        <img src=" {{url('/images/'.$category->pic)}}" alt="" class="icon">

                        <h4>{{ $category->name }}</h4>
                    </a>

                </div>
                @endforeach


            </div>
        </div>
    </section>

    <section id="zoekveld">
        <div class="container">

         
            <form action="{{url('/article/search')}}"  class="form-inline"  method="post">
                 {!! csrf_field() !!}
                <div class="col-sm-12">
                    <h1 class="orange" id="search">Niet gevonden waar je naar opzoek was?</h1>
             
                    <div class="form-group">
                        <input type="text" placeholder="Typ het hier en wij helpen zoeken" class="form-control form-control-lg textfield_form" name="search" >
                     
                        
                        <button type="submit" class="btn btn-warning btn-lg" >ZOEKEN!</button>
                    </div>
                </div>
                </form>
        </div>



    </section>
    
    <section id="googlemaps">
        <div class="container">

        <div id="map"></div>
    
        </div>



    </section>
  
@endsection @section('scripts')
<script>
    var map = new GMaps({
      el: '#map',
      lat: -12.043333,
      lng: -77.028333
    });
  </script>
  @endsection





