@extends('main') @section('title', ' | Home')



<!-- Main jumbotron for a primary marketing message or call to action -->
<section id="hero">
  <div class="jumbotron">
    <div class="container home">
      <h1 class="display-3">Welkom bij MunchDaily!</h1>
      <h5>MunchDaily geeft de mogelijkheid om het teveel aan voedsel aan iemand anders te schenken.</h5>
      <p><a class="btn btn-success btn-lg btn-hero" href="{{ route('article.create') }}" role="button">GEVEN</a>
        <a class="btn btn-warning btn-lg btn-hero" href="{{ route('article.index') }}" role="button">BEKIJK MUNCHIES</a></p>
    </div>
  </div>
</section>


@section('content')

  @guest
<section id="doel-icons">
  <div class="container home">
    <div class="all-icons">


      <div class="icon-wrapper ">
        <a href="{{url('about')}}">
          <img src="{{asset('/images/waste.png')}}" alt="" class="icon">
          <h4>Stop voedselverspilling</h4>
        </a>
      </div>


      <div class="icon-wrapper">
        <a href="{{url('about')}}">
          <img src="{{asset('/images/world.png')}}" alt="" class="icon">
          <h4>Zorg voor het milieu</h4>
        </a>
      </div>


      <div class="icon-wrapper">
        <a href="{{url('about')}}">
          <img src="{{asset('/images/family.png')}}" alt="" class="icon">
          <h4>Maak anderen blij</h4>
        </a>
      </div>

    </div>
  </div>
</section>


<section id="doel-text">
  <div class="container home">
    <h5>Bij MunchDaily zijn wij er van overtuigd dat het voedsel dat je weg wil gooien, een betere plek
verdient bij iemand anders. Door de mogelijkheid te creëren om eten weg te geven, proberen we
voedselverspilling tegen te gaan.
</h5>
    <h5>Word ook lid en schenk je overschotten aan anderen, die dit wel nodig hebben. Zo help je mee
de wereld een betere plek te maken. Niet enkel de ontvanger, maar ook het milieu zal je dankbaar zijn!
</h5>

    <div class="text-center">
      <p><a class="btn btn-warning btn-lg" href="{{url('register')}}" role="button">LID WORDEN</a>

    </div>
  </div>
</section>
@endguest


<section id="vandaag">
  <div class="container home">
    <h1 class="orange">Deze munchies zijn bijna weg!</h1>
    <!-- Example row of columns -->

    <div class="row">

      @foreach($articles as $article)
      <div class="col-md-4">
        <a href="{{url('/article/'.$article->id)}}">
          <div class="artikel">
            <div class="foto">
              <img src="{{asset('/images/'.$article->pic)}}" alt="munchie">
            </div>
            <div class="artikel-content">
              <p class="datum"> <small> {{ Carbon\Carbon::parse($article->datum)->format('d-m-Y') }}</small></p>
              <h3>{{ (strlen($article->title)>15) ? substr(strip_tags($article->title), 0, 20).'...' :strip_tags($article->title)}}</h3>

              <p>{{ (strlen($article->text)>60) ? substr(strip_tags($article->text), 0, 60).'...' :strip_tags($article->text)}}</p>
              <p>{{$article->tijdstip}}

                <strong>
{{ (strlen($article->locatie)>10) ? substr($article->locatie, 0, 10).'...' :$article->locatie}}</strong>
              </p>

              @if(Auth::check() && (Auth::user()->id != $article->user_id))
              <a href="{{url('/article/transaction/'.$article->id)}}" class="btn btn-success">VERZOEK</a> @endif
            </div>
          </div>
        </a>
      </div>
      @endforeach




    </div>

    <div class="text-center">
      <p><a class="btn btn-warning btn-lg" href="{{ route('article.index') }}" role="button">BEKIJK ALLE MUNCHIES</a></p>
    </div>

  </div>
</section>

<section id="categorie">
  <div class="container home">
    <div class="all-icons">

      @foreach($categories as $category)
      <div class="icon-wrapper ">

        <a href="{{ url('article/category/'.$category->id) }}">


<img src=" {{url('/images/'.$category->pic)}}" alt="">

<h4>{{ $category->name }}</h4>
</a>

      </div>
      @endforeach


    </div>
  </div>
</section>

<section id="zoekveld">
  <div class="container home">


  <form action="{{url('/article/search')}}"  class="form-inline"  method="post">
  {!! csrf_field() !!}
 <div class="col-sm-12">
     <h1 class="orange" id="search">Niet gevonden waar je naar opzoek was?</h1>

     <div class="form-group">
         <input type="text" placeholder="Typ het hier en wij helpen zoeken" class="form-control form-control-lg textfield_form" name="search" >
      
         
         <button type="submit" class="btn btn-warning btn-lg" >ZOEKEN</button>
     </div>
 </div>
 </form>
  </div>



</section>

<section id="googlemaps">

    <div id="map"></div>

</section>

@endsection

@section('scripts')
  <script>
    function initMap(){
      // Map options
      var options = {
        zoom:6,
        center:{lat: 51.2194,lng:4.4699}
      }

      // New map
      var map = new google.maps.Map(document.getElementById('map'), options);

 

      /*
      // Add marker
      var marker = new google.maps.Marker({
        position:{lat:42.4668,lng:-70.9495},
        map:map,
        icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
      });

      var infoWindow = new google.maps.InfoWindow({
        content:'<h1>Lynn MA</h1>'
      });

      marker.addListener('click', function(){
        infoWindow.open(map, marker);
      });
      */

      // Array of markers
	   var markers = {!! $markers !!};
      /*var markers = [
        {
          coords:{lat:42.4668,lng:-70.9495},
          iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
          content:'<h1>Lynn MA</h1>'
        },
        {
          coords:{lat:42.8584,lng:-70.9300},
          content:'<h1>Amesbury MA</h1>'
        },
        {
          coords:{lat:42.7762,lng:-71.0773}
        }
      ];*/

      // Loop through markers
      for(var i = 0;i < markers.length;i++){
        // Add marker
		if(markers[i][1] == "" || markers[i][2] == "" ) continue ;
        addMarker(markers[i]);
      }

      // Add Marker Function
      function addMarker(props){
	  
	    
		var coord = {
		  lat: Number(props[2]) ,lng: Number(props[1] )
		}
		console.log(coord)
        var marker = new google.maps.Marker({
          position:coord,
          map:map,
          //icon:props.iconImage
        });
 
 
         var infoWindow = new google.maps.InfoWindow({
            content:"<a href='./article/"+props[0]+"'>go to the post</a>"
          });

          marker.addListener('click', function(){
            infoWindow.open(map, marker);
          }); 
         
      }
    }
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9J-fz25ba11CPhJrLzgGkEAmdDdJvK4U&callback=initMap">
    </script>

@endsection
