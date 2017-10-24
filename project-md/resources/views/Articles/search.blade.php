@extends('main') @section('title', '| Create New Post') @section('content')



<!-- Blog Post -->
<section id="vandaag">
  <div class="container extra">

    <p><a href="/" class="green">Home</a> > Munchies </p>

    <div class="row">


      <h1 class="orange col-md-6" >Munchies</h1>

      <div class="cat">
        @foreach($categories as $category)
          <a href="{{ url('article/category/'.$category->id) }}">
            <img src="/images/{{ $category->pic }} " alt="">
            <p>{{$category->name}}</p>
          </a>
        @endforeach
      </div>

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
