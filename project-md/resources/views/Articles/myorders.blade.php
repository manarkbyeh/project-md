@extends('main') @section('title', '| Edit Blog Post') @section('content')



  <section id="vandaag">
    <div class="container extra">


      <p>
        <a href="/" class="green">Home</a> > <a href="" class="green">Profiel</a> > Mijn verzoeken
      </p>

      <div class="row">
        <h1 class="orange col-md-6" id="search">Mijn verzoeken</h1>
      </div>
      <div class="row">


      @foreach($articles as $article)
        <div class="col-md-4">
          <a href="/article/{{$article->id}}">
            <div class="artikel">
              <div class="foto">
                <img src="{{url('/images/'.$article->pic)}}" alt="munchie">
              </div>
              <div class="artikel-content">
                <p class="datum">{{$article->datum}}</p>
                <h2>{{$article->title}}</h2>
                <p>{{strip_tags($article->text)}}</p>
                <p class="datum_locatie">{{$article->tijdstip}} <strong>{{$article->locatie}}</strong></p>
              </div>
            </div>
          </a>
        </div>
      @endforeach


    </div>
      </div>
  </section>

@endsection