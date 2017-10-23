@extends('main') @section('title', '| Create New Post') @section('content')



<!-- Blog Post -->
<section id="vandaag">
  <div class="container extra">


    <p><a href="/" class="green">Home</a> > Munchies </p>


    <div class="row">
      <h1 class="orange col-md-6">Munchies <a href="{{url('/article/create')}}" class="btn btn-success">TOEVOEGEN</a></h1>

      <div class="cat">
            @foreach($categories as $category)
                <a href="{{ url('article/category/'.$category->id) }}">
                  <img src="/images/{{ $category->pic }} " alt="">
                  <p>{{$category->name}}</p>
                </a>
            @endforeach
      </div>


   </div>


  <div class="container">
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
    <a href="{{url('/article/transaction/'.$article->id)}}" class="btn btn-success">VERZOEK</a> @endif
              </div>
            </div>
          </a>
        </div>
      @endforeach





    </div>
      <div class="text-center">
          {!! $articles->links() !!}
      </div>
  </div>




  </div>
</section>



@endsection
