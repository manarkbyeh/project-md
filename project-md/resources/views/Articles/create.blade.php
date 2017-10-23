@extends('main') @section('title', '| Create New Post') @section('stylesheets') {!! Html::style('css/parsley.css') !!} @endsection @section('content')


  <div class="container extra">


    <h2 class="page_title">Munchie Toevoegen</h2>

    <p class="lead">
      Op deze pagina kunt u een artikel ter beschikking stellen aan anderen.
      Vul alle velden in zodat andere gebruikers precies weten welk product u ter beschikking stelt.
    </p>


    {!! Form::open(array('route' => 'article.store', 'data-parsley-validate' => '', 'files' => true)) !!}


    <div class="form-group  has-feedback">
      <label class="control-label">Foto</label>
      <div class="input-group" id="img" style="padding:0 ">
        <input type="text" class="form-control" readonly="true" />
        <label class="input-group-btn" style="display: table-cell;">
        <span class="btn btn-success">BROWSE&hellip;
          <input type="file" name="pic" Style="display: none;" accept="image/x-png,image/gif,image/jpeg" />
      
        </span>
        </label>
      </div>
      <small id="fileHelp" class="form-text text-muted">Kies hier een afbeelding voor uw munchie.</small>
    </div>




<div class="form-group  has-feedback">

  <label class=" control-label">Titel munchie</label>
  {{ Form::text('title',old('title'),array('class' =>'form-control ', 'required' => '','maxlength'=>'255'))}}
  <small id="fileHelp" class="form-text text-muted">Kies een passende titel.</small>

</div>



<div class="form-group  has-feedback">
  <label class=" control-label">Omschrijving </label>
  {{ Form::textarea('text',old('text'),array('class' =>'form-control', 'required' => '', 'placeholder'=>'Geef hier een korte omschrijving van het product en vertel ons waarom je het product weg wilt geven.'))}}
</div>


<div class="form-group  has-feedback">
  <label class=" control-label"> Houdbaarheidsdatum </label>
  {{ Form::date('datum',old('datum'),array('class' =>'form-control ', 'required' => '','maxlength'=>'255'))}}
  <small id="fileHelp" class="form-text text-muted">Tot op welke datum is dit artikel goed?</small>
</div>

    <div class="form-group has-feedback">
      <label class=" control-label">Categorie</label>
      <select class="form-control" name="category_id">
        @foreach($categories as $category)
          <option value='{{ $category->id }}'>{{ $category->name }}</option>
        @endforeach
      </select>
    </div>

 


    <div class="form-group">
      <label class=" control-label"> Tijdstip </label>
      {{ Form::text('tijdstip',old('tijdstip'),array('class' =>'form-control ', 'required' => '','maxlength'=>'255'))}}
      <small id="fileHelp" class="form-text text-muted">Om hoe laat mogen ze dit artikel komen halen?</small>
    </div>
     

    
    <div class="form-group">
      <style>
       #map {
        height: 400px;
        width: 100%;
       }
      </style>
      <label class=" control-label"> Please Select your location  </label>
      <div id="map"></div>
      <input type="hidden" id="latLngLat" name="latLngLat">
      <input type="hidden" id="latLngLng" name="latLngLng">
      
    </div>


{{ Form::submit('TOEVOEGEN',array('class' =>'btn btn-success pull-left', 'style'=>'margin-top:20px'))}}
<center><i class="fa fa-spinner fa-spin fa-2x loading hidden"></i></center>
{!! Form::close() !!}

    <br>
    <br>
    <br>
    <br>


  </div>

      <script>

      var map;
      var markers = [];

      function initMap() {
        var haightAshbury = {lat:50.5039, lng:4.4699};

        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: haightAshbury,
          mapTypeId: 'terrain'
        });

        // This event listener will call addMarker() when the map is clicked.
        map.addListener('click', function(event) {
          addMarker(event.latLng);
       
          latLngLat = event.latLng.lat();
          latLngLng = event.latLng.lng();

          $('#latLngLat').val(latLngLat);
          $('#latLngLng').val(latLngLng);
        });

        // Adds a marker at the center of the map.
        addMarker(haightAshbury);
      }

      // Adds a marker to the map and push to the array.
      function addMarker(location) {

        deleteMarkers();

        var marker = new google.maps.Marker({
          position: location,
          map: map
        });
        markers.push(marker);
      }

      // Sets the map on all markers in the array.
      function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }

      // Removes the markers from the map, but keeps them in the array.
      function clearMarkers() {
        setMapOnAll(null);
      }

      // Deletes all markers in the array by removing references to them.
      function deleteMarkers() {
        clearMarkers();
        markers = [];
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9J-fz25ba11CPhJrLzgGkEAmdDdJvK4U&callback=initMap">
    </script>
    @endsection @section('scripts') {!! Html::script('js/parsley.min.js') !!} @endsection
