@extends('main') @section('title', '| About')



@section('content')


    <div class="full">

    </div>

    <div class="container">

        <div class="about">
            <h1 class="green">Wat doen wij?</h1>
            <p class="lead">
                Bij MunchDaily proberen we zo veel mogelijk om voedselverspilling tegen te gaan. Het eten dat jij te veel heeft, heeft een ander te kort.
                Wij zorgen voor een manier om gever en ontvanger samen te brengen. Zo kan de gever van zijn overbodige voedsel af en kan de ontvanger hiervan genieten.
            </p>
        <div class="row">

            <div class="col-md-4">


            <div class="about-foto">
                <img src="{{asset('/images/waste.png')}}" alt="">
            </div>


            <div class="about-content">
                <h4 class="green">Voedselverspilling</h4>
                <p>  Wereldwijd verspillen we met zen allen een derde van het voedsel dat we produceren. Omdat het fruit ‘misvormd’ is, de boontjes niet de juiste lengte hebben, of gewoon omdat we meer kopen dan we kunnen consumeren. Ondertussen lijden wereldwijd 805 miljoen mensen honger.
                </p>

            </div>
        </div>

            <div class="col-md-4">


            <div class="about-foto">
                <img src="{{asset('/images/world.png')}}" alt="">

            </div>


            <div class="about-content">
                <h4 class="green">Milieu</h4>
                 <p>Er wordt wereldwijd 1,3 miljard ton per jaar verspild, dat is een derde van al het voedsel dat wordt geproduceerd. De Europese Commissie heeft berekend dat ieder jaar minstens 170 Megaton CO2 emissie toegeschreven kan worden aan voedselverspilling in de EU.

               Zonder verspilling thuis zou de uitstoot per consument gemiddeld met 1,5% afnemen. Dat lijkt niet veel, maar staat gelijk aan de uitstoot van ruim een miljoen auto’s.</p>
                </p>
            </div>
        </div>

            <div class="col-md-4">

            <div class="about-foto">
                <img src="{{asset('/images/family.png')}}" alt="">

            </div>
            <div class="about-content">
                <h4 class="green">Mensen</h4>
                <p> Door gebruik te maken van het platform MunchDaily kunt u voedseloverschotten schenken aan mensen die deze producten wel kunnen gebruiken.

                   U kunt zowel delen als ontvangen op ons platform. Misschien heeft iemand anders iets wat jij nodig hebt.</p>
                </p>
            </div>
        </div>


        </div>

        </div>
    </div>




@stop