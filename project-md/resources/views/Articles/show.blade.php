@extends('main') @section('title', '| View Article') @section('content')


    <div class="container extra">


        <p><a href="/" class="green">Home</a> > <a href="/articles" class="green">Munchies</a> > {{$articles->title}}</p>
        <br>
        <br>

        <div class="row">
            <div class="munchie col-md-8">

                <div class="munchie-foto">
                    <img src="{{url('/images/'.$articles['pic'])}}" alt="">
                </div>
                <div class="munchie-content">
                    <h1>{{$articles->title}}</h1>
                    <p class="lead">{{strip_tags($articles->text)}} </p>

                    <div class="details">
                        <div class="icon-wrapper"><a href=""><img src="/images/carrot-black.png" alt="" class="icon"><p>groenten</p></a></div>
                        <div class="icon-wrapper"><a href=""><img src="/images/location.png" alt="" class="icon"><p>Deurne</p></a></div>
                        <div class="icon-wrapper"><a href=""><img src="/images/calendar.png" alt="" class="icon"><p>{{$articles->datum}}</p></a></div>
                        <div class="icon-wrapper"><a href=""><img src="/images/clock.png" alt="" class="icon"><p>21:00 - 22:00 </p></a></div>
                    </div>

                    <a class="btn btn-success btn-lg" href="#" role="button">VERZOEK STUREN</a>
                </div>


                <!-- BERICHTEN -->
                <div class="berichten">

                    <p>hier komen de berichten</p>
                    <div class="bericht-foto">

                    </div>
                    <div class="bericht-content">

                    </div>

                </div>

            </div>



            <div class="vergelijkbaar col-md-4">
                <h4>Vergelijkbare munchies</h4>

                @foreach($articles as $article)

                    <a href="/article/{{$articles->id}}">
                        <div class="artikel-ver">
                            <div class="foto-ver">
                                <img src="{{url('/images/'.$articles['pic'])}}" alt="">
                            </div>

                            <div class="artikel-content-ver">
                                <p class="datum">{{$articles->datum}}</p>
                                <h4>{{$articles->title}}</h4>
                                <p class="datum_locatie">{{$articles->tijdstip}} <strong>{{$articles->locatie}}</strong></p>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>



        </div>



    </div>


@endsection