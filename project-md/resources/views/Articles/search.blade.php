@extends('main') @section('title', '| Zoekresultaten') @section('content')



  <!-- Blog Post -->
  <section id="vandaag">
    <div class="container extra">

      <p><a href="{{url('/')}}" class="green">Home</a> > Zoekresultaten </p>

      <div class="row">


        <h1 class="orange col-md-6" >Zoekresultaten</h1>

      </div>
      <div class="row">

        @foreach($articles as $article)
          @if($article->active == 0)
          <div class="col-md-4">
            <a href="{{url('/article/'.$article->id)}}">
              <div class="artikel">
                <div class="foto">
                  <img src="{{url('/images/'.$article->pic)}}" alt="munchie">
                </div>
                <div class="artikel-content">
                  <p class="datum">{{$article->datum}}</p>
                  <h2>{{$article->title}}</h2>
                  <p>{{strip_tags($article->text)}}</p>
                  <p class="datum_locatie">{{$article->tijdstip}} <strong>{{$article->locatie}}</strong></p>
                  @if(Auth::check() && (Auth::user()->id != $article->user_id))
                    <a href="{{url('/article/transaction/'.$article->id)}}" class="btn btn-warning">VERZOEK DEZE MUNCHIE</a> @endif
                </div>
              </div>
            </a>
          </div>
          @endif
        @endforeach



      </div>

    </div>
  </section>



@endsection
