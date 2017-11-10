@extends('main') @section('title', '| Nieuwe munchie')  @section('content')


  <div class="container extra">


    <h2 class="page_title">Munchie Toevoegen</h2>

    <p class="lead">
      Op deze pagina kunt u een artikel ter beschikking stellen aan anderen.
      Vul alle velden in zodat andere gebruikers precies weten welk product u ter beschikking stelt.
    </p>

    <div id="article_div"></div>

    {!! Form::open(array('route' => 'article.store', 'id' => 'article', 'files' => true)) !!}

    <div class="form-group  has-feedback">
      <label class="control-label">Foto</label>
      <div class="input-group" id="img" style="padding:0 ">
        <input type="text" name="pic2" class="form-control"  readonly="true" />
        <label class="input-group-btn" style="display: table-cell;">
        <span class="btn btn-success">ZOEK EEN FOTO
          <input type="file" id="previewpicimg" name="pic" data-required-message="selecteer een foto aub." Style="display: none;" accept="image/x-png,image/gif,image/jpeg"  required="" />

        </span>
        </label>
      </div>
      <small id="fileHelp" class="form-text text-muted">Kies hier een afbeelding voor uw munchie.</small>
    </div>
    <div class="img_error"></div>




<div class="form-group  has-feedback">

  <label class=" control-label">Titel munchie (*)</label>
  {{ Form::text('title',old('title'),array('class' =>'form-control ', 'required' => '','maxlength'=>'255'))}}
  <small id="fileHelp" class="form-text text-muted">Kies een passende titel.</small>

</div>



<div class="form-group  has-feedback">
  <label class=" control-label">Omschrijving (*)</label>
  {{ Form::textarea('text',old('text'),array('class' =>'form-control', 'required' => '', 'placeholder'=>'Geef hier een korte omschrijving van het product en vertel ons waarom je het product weg wilt geven.'))}}
</div>


<div class="form-group  has-feedback">
  <label class=" control-label"> Houdbaarheidsdatum (*) </label>
  {{ Form::date('datum',old('datum'),array('class' =>'form-control', 'id'=>'datepicker' , 'data-parsley-required-message' => 'moet een datum bevatten.', 'min'=>'2017-11-10','max'=>'2018-04-20', 'required' => '','maxlength'=>'255'))}}
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
      <label class=" control-label"> Tijdstip (*) </label>
      {{ Form::time('tijdstip',old('tijdstip'),array('class' =>'form-control ', 'data-parsley-required-message' => 'moet een uur bevatten.', 'required' => '','maxlength'=>'255'))}}
      <small id="fileHelp" class="form-text text-muted">Om hoe laat mogen ze dit artikel komen halen?</small>
    </div>



    <div class="form-group">
      <style>
       #map {
        height: 400px;
        width: 100%;
       }
      </style>
      <label class=" control-label">Duid je locatie aan op de kaart. (*)</label>
      <div id="mapvalidation"></div>
      <div id="map"></div>
      <input type="hidden" id="latLngLat" name="latLngLat" value="" required>
      <input type="hidden" id="latLngLng" name="latLngLng" value="" required>

    </div>

<a href="#article_div" style="margin-top:20px" class="btn btn-success pull-left btn-submit">TOEVOEGEN</a>
    <br>
    <br>
    <br>
    <br>


  </div>
  @endsection @section('scripts')
  <script type="text/javascript" src="{{ asset('js/jquery-validation/jquery.validate.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

      <script>
    $(document).ready(function() {

      $('body').on('click', '.btn-submit', function(e){

        e.preventDefault();

        var valid = $("#article").valid();
        var latv = $("#latLngLat").val();

        if(valid && latv != '') {
            $('#article')[0].submit();
        } else {
            if(latv == ''){
              $('#mapvalidation').addClass('alert alert-danger');
              $('#mapvalidation').html('Het is belangrijk dat je je locatie aanduidt.');
            }
              if (
              location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
              &&
              location.hostname == this.hostname
            ) {
              // Figure out element to scroll to
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
              // Does a scroll target exist?
              if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                  scrollTop: (target.offset().top - 80)
                }, 1000, function() {
                  // Callback after animation
                  // Must change focus!
                  var $target = $(target);
                  $target.focus();
                  if ($target.is(":focus")) { // Checking if the target was focused
                    return false;
                  } else {
                    $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                    $target.focus(); // Set focus again
                  };
                });
              }
            }

          }

      });

        $('#article').validate({

            rules: {
                title: {
                  required: true,
                },


                text: {
                  required: true,

                },
                tijdstip: {
                  required: true,

                },
                category_id: {
                  required: true,

                },
                datum: {
                  required: true,

                },

                pic2: {
                  required: true,
                  accept: "image/jpg,image/jpeg,image/png,image/gif"
                  }

            },

            messages: {
              title : 'moet een titel bevatten.',
              text : 'moet een omschrijving bevatten.',
              pic2 : 'moet een foto bevatten.',
              pic : {required: 'Selecteer een foto.', accept: 'Dit is geen correct foto bestand.'}

            },
        highlight: function (input) {
            $(input).parent().addClass('error');
        },
        unhighlight: function (input) {
            $(input).parent().removeClass('error');
        },
        errorPlacement: function (error, element) {

          if(element.attr("name") == "pic2") {
                error.appendTo($('.img_error'));
            } else {
              $(element).parent().append(error);

            }
          },


        });

    });

      var map;
      var markers = [];

      function initMap() {
        var haightAshbury = {lat:51.2194, lng:4.4025};

        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
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
    //  $('#submit').click(function(e){
    //     var latv = $("#latLngLat").val();
    //   if(latv == ''){
    //     $('#mapvalidation').addClass('alert alert-danger');
    //     $('#mapvalidation').html('Het is belangrijk dat je je locatie aanduidt.');
    //     return e.preventDefault();
    //   }
    //   });
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9J-fz25ba11CPhJrLzgGkEAmdDdJvK4U&callback=initMap">
    </script>


 @endsection
