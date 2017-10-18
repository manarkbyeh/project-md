@extends('main') @section('title', '| Create New Post') @section('content')



<!-- Blog Post -->
<<<<<<< HEAD
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
=======
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
              </div>
            </div>
          </a>
        </div>
      @endforeach




    </div>

  </div>
</section>



@endsection
>>>>>>> 232f49e662bbbc2b8c2320066660948992c5bc3f
