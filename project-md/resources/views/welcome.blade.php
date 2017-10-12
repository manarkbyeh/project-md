@extends('main') @section('title', '| All Posts')

<!-- Main jumbotron for a primary marketing message or call to action -->
<section id="hero">
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Welkom bij MunchDaily!</h1>
            <p>Op ons platform kan je eten geven of in ontvangst nemen</p>
            <p><a class="btn btn-success btn-lg" href="#" role="button">GEVEN</a> <a class="btn btn-warning btn-lg" href="#" role="button">ONTVANGEN</a></p>
        </div>
    </div>
</section>

@section('content')

    <section id="vandaag">
        <div class="container">
            <h1 class="orange">Vandaag</h1>
            <!-- Example row of columns -->

            <div class="row">
                <div class="col-md-4">
                    <div class="artikel">
                        <div class="foto"></div>
                        <div class="artikel-content">
                            <p class="datum">28 september</p>
                            <h2>Verse tomaten uit de tuin</h2>
                            <p class="datum_locatie">21:00 - 22:00 <strong>Deurne</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="artikel">
                        <div class="foto"></div>
                        <div class="artikel-content">
                            <p class="datum">28 september</p>
                            <h2>Verse tomaten uit de tuin</h2>
                            <p class="datum_locatie">21:00 - 22:00 <strong>Deurne</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="artikel">
                        <div class="foto"></div>
                        <div class="artikel-content">
                            <p class="datum">28 september</p>
                            <h2>Verse tomaten uit de tuin</h2>
                            <p class="datum_locatie">21:00 - 22:00 <strong>Deurne</strong></p>
                        </div>
                    </div>
                </div>


                <p><a class="rechts" href="">meer</a></p>
            </div>
        </div>
    </section>

    <section id="categorie">
        <div class="container">
            <div class="all-icons">
                <div class="icon-wrapper ">
                    <a href="/">
                        <img src="../../public/images/apple.png" alt="" class="icon">
                        <h4>fruit</h4>
                    </a>
                </div>

                <div class="icon-wrapper">
                    <a href="/">
                        <img src="../../public/images/carrot.png" alt="" class="icon">
                        <h4>groenten</h4>
                    </a>
                </div>

                <div class="icon-wrapper">
                    <a href="/">
                        <img src="../../public/images/meat.png" alt="" class="icon">
                        <h4>vlees</h4>
                    </a>
                </div>

                <div class="icon-wrapper">
                    <a href="/">
                        <img src="../../public/images/chocolate.png" alt="" class="icon">
                        <h4>snacks</h4>
                    </a>
                </div>

                <div class="icon-wrapper">
                    <a href="/">
                        <img src="../../public/images/coffee-cup.png" alt="" class="icon">
                        <h4>drinken</h4>
                    </a>
                </div>

                <div class="icon-wrapper">
                    <a href="/">
                        <img src="../../public/images/apple.png" alt="" class="icon">
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
                    <h1 class="orange">Niet gevonden waar je naar opzoek was?</h1>
                    <div class="form-group">
                        <input type="text" placeholder="Typ het hier en wij helpen zoeken" class="form-control form-control-lg textfield_form" >
                        <a class="btn btn-warning btn-lg" href="#" role="button">ZOEKEN</a>
                    </div>
                </div>
            </form>
        </div>



    </section>
@stop





