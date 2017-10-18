@extends('main') @section('title', '| Create New Post') @section('content')



<!-- Blog Post -->
<section id="vandaag">
  <div class="container">

    <br>
    <br>
    <br>
    <br>
    <p><a href="/" class="green">Home</a> > Munchies </p>

    <div class="row">


      <h1 class="orange col-md-6" id="search">Munchies</h1>

      <p class="col-md-6 cat">
        <a href="" class="green">alles</a>
        <a href="">fruit</a>
        <a href="">groenten</a>
        <a href="">vlees</a>
        <a href="">snacks</a>
        <a href="">drinken</a>
        <a href="">anderen</a>
      </p>

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
                @if(Auth::check() && (Auth::user()->id != $article->user_id))
    <a href="{{url('/article/transaction/'.$article->id)}}" class="btn btn-success">Order &rarr;</a> @endif
              </div>
            </div>
          </a>
        </div>
      @endforeach




    </div>

  </div>
</section>



@endsection
