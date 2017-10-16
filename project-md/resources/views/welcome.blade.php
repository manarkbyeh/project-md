@extends('main') @section('title', '| All Posts')

<!-- Main jumbotron for a primary marketing message or call to action -->
<section id="hero">
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Welkom bij MunchDaily!</h1>
            <p>MunchDaily geeft de mogelijkheid om het te veel aan voedsel aan iemand anders te schenken.</p>
            <p><a class="btn btn-success btn-lg btn-hero" href="#" role="button">GEVEN</a>
                <a class="btn btn-warning btn-lg btn-hero" href="#" role="button">ONTVANGEN</a></p>
        </div>
    </div>
</section>

@section('content')


    <section id="doel-icons">
        <div class="container">
            <div class="all-icons">
                <div class="icon-wrapper ">
                    <a href="/">
                        <img src="/images/waste.png" alt="" class="icon">
                        <h4>Stop voedselverspilling</h4>
                    </a>
                </div>

                <div class="icon-wrapper">
                    <a href="/">
                        <img src="/images/world.png" alt="" class="icon">
                        <h4>Zorg voor het milieu</h4>
                    </a>
                </div>

                <div class="icon-wrapper">
                    <a href="/">
                        <img src="/images/family.png" alt="" class="icon">
                        <h4>Maak anderen blij</h4>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <section id="doel-text">
        <div class="container">
        <h6>"Bij MunchDaily zijn wij er van overtuigd dat het voedsel dat je weg wilt gooien, een betere plek kan
        krijgen bij iemand anders. Door de mogelijkheid te creëren om eten weg te geven proberen we
            voedselverspilling tegen te gaan.
        </h6>
        <h6>Word ook lid en schenk je overschotten aan anderen die dit wel nodig hebben, zo help je mee
        de wereld een betere plek te maken. Niet enkel de ontvanger, maar ook het milieu zal je dankbaar zijn!
        </h6>

            <div class="text-center">
                <p><a class="btn btn-warning btn-lg" href="#" role="button">LID WORDEN</a>

            </div>
        </div>
    </section>







    <section id="vandaag">
        <div class="container">
            <h1 class="orange" id="search">Deze munchies zijn bijna weg!</h1>
            <!-- Example row of columns -->

            <div class="row">

                @foreach($articles as $article)
                <div class="col-md-4">
                    <div class="artikel">
                        <div class="foto">
                            <img src="{{url('/images/'.$article->pic)}}" alt="munchie">

                        </div>
                        <div class="artikel-content">
                            <p class="datum">{{$article->datum}}</p>
                            <h2>{{$article->title}}</h2>
                            <p>{{strip_tags($article->text)}}</p>
                            <p class="datum_locatie">21:00 - 22:00 <strong>Deurne</strong></p>
                        </div>
                    </div>
                </div>
                @endforeach

                


            </div>

                <div class="text-center">
                    <p><a class="btn btn-warning btn-lg" href="#" role="button">BEKIJK ALLE MUNCHIES</a></p>
                </div>

        </div>
    </section>

    <section id="categorie">
        <div class="container">
            <div class="all-icons">
                <div class="icon-wrapper ">
                    <a href="/">
                        <img src="/images/apple.png" alt="" class="icon">
                        <h4>fruit</h4>
                    </a>
                </div>

                <div class="icon-wrapper">
                    <a href="/">
                        <img src="/images/carrot.png" alt="" class="icon">
                        <h4>groenten</h4>
                    </a>
                </div>

                <div class="icon-wrapper">
                    <a href="/">
                        <img src="/images/meat.png" alt="" class="icon">
                        <h4>vlees</h4>
                    </a>
                </div>

                <div class="icon-wrapper">
                    <a href="/">
                        <img src="/images/chocolate.png" alt="" class="icon">
                        <h4>snacks</h4>
                    </a>
                </div>

                <div class="icon-wrapper">
                    <a href="/">
                        <img src="/images/coffee-cup.png" alt="" class="icon">
                        <h4>drinken</h4>
                    </a>
                </div>

                <div class="icon-wrapper">
                    <a href="/">
                        <img src="/images/apple.png" alt="" class="icon">
                        <h4>andere</h4>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="zoekveld">
        <div class="container">

            <form class="form-inline">
                <div class="col-sm-12">
                    <h1 class="orange" id="search">Niet gevonden waar je naar opzoek was?</h1>
                    <div class="form-group">
                        <input type="text" placeholder="Typ het hier en wij helpen zoeken" class="form-control form-control-lg textfield_form" >
                        <a class="btn btn-warning btn-lg" href="#" role="button">ZOEKEN</a>
                    </div>
                </div>
            </form>
        </div>



    </section>
@stop





