@extends('main') @section('title', '| Edit Blog Post') @section('content')


    <section id="vandaag">
        <div class="container extra">


            <p>
                <a href="/" class="green">Home</a> > <a href="" class="green">Profiel</a> > Mijn munchies
            </p>

            <div class="row">
                <h1 class="orange col-md-6">Mijn munchies <a href="{{url('/article/create')}}" class="btn btn-success">TOEVOEGEN</a></h1>
            </div>
            <div class="row">


                @foreach($articles as $article)

        <?php
                    $current_date = Carbon\Carbon::now();

                    $current_date = $current_date->toDateString();

                   ?>


<<<<<<< HEAD
                    <div class="col-md-4">
                        <a href="{{url('/article/'.$article->id.'/edit')}}">
                            <div class="artikel">
                                <div class="foto">
                                    <img src="{{url('/images/'.$article->pic)}}" alt="munchie">
                                </div>
                                <div class="artikel-content @if( $article->active== 1 || $article->datum < $current_date) deactiveren @endif">
                                    <p class="datum">{{$article->datum}}</p>
                                    <h2>{{$article->title}}</h2>
                                    <p>{{strip_tags($article->text)}}</p>
                                    <p class="datum_locatie">{{$article->tijdstip}} <strong>{{$article->locatie}}</strong></p>


                                    <?php
                                    $current_date = Carbon\Carbon::now();

                                    $current_date = $current_date->toDateString();

                                    if($article->datum > $current_date){ ?>
=======
          <div class="col-md-4">
            <a href="{{url('/article/'.$article->id.'/edit')}}">
              <div class="artikel">
                <div class="foto">
                  <img src="{{url('/images/'.$article->pic)}}" alt="munchie">
                </div>
                <div class="artikel-content @if( $article->active== 1 || $article->datum < $current_date) deactiveren @endif">
                  <p class="datum">{{$article->datum}}</p>
                  <h2>{{ (strlen($article->title)>15) ? substr(strip_tags($article->title), 0, 40).'...' :strip_tags($article->title)}}</h2>
                  <p>{{ (strlen($article->text)>60) ? substr(strip_tags($article->text), 0, 60).'...' :strip_tags($article->text)}}</p>
                  <p class="datum_locatie">{{$article->tijdstip}} <strong>{{$article->locatie}}</strong></p>


                    <?php
                
                    if($article->datum > $current_date){ ?>
>>>>>>> 04a5cb11278511b2d0618556866e0775c745377f

                  <?php } else

                                    { ?>


                                    <h5 class="rood">Dit product is vervallen</h5>

                                    <?php } ?>



                                    <form action="{{url('/article/'.$article->id)}}" method="post">
                                        {{csrf_field()}} {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger" title="">
                                            <img src="{{asset('/images/garbage.png')}}" alt=""></button>

                                    </form>








                                    <div class="row">

                                        <a class="btn btn-success" href="{{url('/article/'.$article->id.'/edit')}}">

                                            <img src="{{asset('/images/edit.png')}}" alt="">
                                        </a>

                                        @if(Auth::check() && Auth::User()->id==$article->user_id && $article->active == 0)
                                            <span class="btn btn-warning btn-sm jsActive" data-id="{{$article->id}}">

</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach


            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var root = "{{ url('article/')}}" + "/";
            $('span.jsActive').click(function() {
                var id = this.dataset.id,
                    self = this;

                $.ajax({
                    url: root + id + '/active',
                    method: "get"
                }).done(function(msg) {
                    if (msg == 'true') {
                        self.parentElement.removeChild(self);
                    } else {
                        alert("Try again");
                    }
                }).fail(function(jqXHR, textStatus) {
                    alert("Try again");
                });

            });

        });
    </script>
@endsection
