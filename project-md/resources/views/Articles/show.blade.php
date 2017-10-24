@extends('main') @section('title', '| View Article') @section('content')


    <div class="container extra">


        <p><a href="{{url('/')}}" class="green">Home</a> > <a href="{{url('/article')}}" class="green">Munchies</a> > {{$article->title}}</p>
        <br>
        <br>

        <div class="row">
            <div class="munchie col-md-8">

                <div class="munchie-foto">
                    <img src="{{url('/images/'.$article['pic'])}}" alt="">
                </div>
                <div class="munchie-content">
                    <h1>{{$article->title}}</h1>

                    <div class="row">

                        <div class="col-md-12"><p class="lead content-text">{{strip_tags($article->text)}}</p> </div>

                    </div>
                    <div class="details">
                        <div class="icon-wrapper show"><a href=""><img src="{{asset('/images/carrot-black.png')}}" alt="" class="icon"><p>groenten</p></a></div>
                        <div class="icon-wrapper show"><a href=""><img src="{{asset('/images/calendar.png')}}" alt="" class="icon"><p>{{$article->datum}}</p></a></div>
                        <div class="icon-wrapper show"><a href=""><img src="{{asset('/images/clock.png')}}" alt="" class="icon"><p>{{$article->tijdstip}}</p></a></div>
                    </div>

                    <a class="btn btn-success btn-lg" href="{{url('/article/transaction/'.$article->id)}}" role="button">VERZOEK</a>
                </div>


                <!-- BERICHTEN -->
                <div class="berichten">


                    <div class="fb-comments" data-href="https://www.facebook.com/DailyMunch-146808462720538/?ref=settings/{{ $article->id }}" data-numposts="5"></div>


                </div>

            </div>



            <div class="vergelijkbaar col-md-4">
                <h4>Vergelijkbare munchies</h4>

                @foreach($articles as $art)

                    <a href="/article/{{$art->id}}">
                        <div class="artikel-ver">
                            <div class="foto-ver">
                                <img src="{{url('/images/'.$art['pic'])}}" alt="">
                            </div>

                            <div class="artikel-content-ver">
                                <p class="datum">{{$art->datum}}</p>
                                <h4>{{$art->title}}</h4>
                                <p class="datum_locatie">{{$art->tijdstip}} <strong>{{$art->locatie}}</strong></p>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>



        </div>



    </div>


@endsection