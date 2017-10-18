@extends('main') @section('title', '| Edit Blog Post') @section('content')

  <br>
  <br>
  <br>
  <br>

<<<<<<< HEAD
  <div class="col-xs-12 col-md-6 mb-4">
    <div class="card">
      <img class="card-img-top" src="{{url('/images/'.$n->pic)}}" style="height:190px" alt="">
      <div class="card-body">
        <h4 class="card-title">{{$n->title}}</h4>
        <p class="card-text">{{strip_tags($n->text)}}</p>
        <p class="card-text">{{strip_tags($n->datum)}}</p>

      </div>
      <div class="card-footer text-center">
        <?php
$current_date = Carbon\Carbon::now();

$current_date = $current_date->toDateString();

if($n->datum > $current_date){ ?>

          <form action="{{url('/article/'.$n->id)}}" method="post">
            {{csrf_field()}} {{method_field('DELETE')}}
            <a href="{{url('/article/'.$n->id)}}" class="btn btn-primary" title="">Show</a>
            <a href="{{url('/article/'.$n->id.'/edit')}}" class="btn btn-warning" title="">Edite</a>
            <button type="submit" class="btn btn-danger" title="">Delete</button>
          </form>
          <?php } else { ?>
            <h4>End</h4>

            <?php } ?>
=======
  <section id="vandaag">
    <div class="container">


      <p>
        <a href="/" class="green">Home</a> > <a href="" class="green">Profiel</a> > Mijn munchies
      </p>

      <div class="row">
        <h1 class="orange col-md-6" id="search">Mijn munchies <a href="{{url('/article/create')}}" class="btn btn-success">TOEVOEGEN</a></h1>
>>>>>>> 232f49e662bbbc2b8c2320066660948992c5bc3f
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

                <a href="{{url('/article/'.$article->id.'/edit')}}"><img src="/images/edit.png" alt=""></a>
                <a href="{{url('/article/'.$article->id)}}"><img src="/images/garbage.png" alt=""></a>
              </div>
            </div>
          </a>
        </div>
      @endforeach


    </div>
<<<<<<< HEAD
  </div>

  @endforeach
</div>
=======
  </section>

>>>>>>> 232f49e662bbbc2b8c2320066660948992c5bc3f
@endsection