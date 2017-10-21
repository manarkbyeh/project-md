@extends('main') @section('title', '| Edit Blog Post') @section('content')


  <section id="vandaag">
    <div class="container extra">


      <p>
        <a href="/" class="green">Home</a> > <a href="" class="green">Profiel</a> > Mijn munchies
      </p>

      <div class="row">
        <h1 class="orange col-md-6" id="search">Mijn munchies <a href="{{url('/article/create')}}" class="btn btn-success">TOEVOEGEN</a></h1>
      </div>
      <div class="row">


      @foreach($articles as $article)
    

    
        <div class="col-md-4">
          <a href="/article/{{$article->id}}">
            <div class="artikel">
              <div class="foto">
                <img src="{{url('/images/'.$article->pic)}}" alt="munchie">
              </div>
              <div class="artikel-content @if( $article->active== 0) orange @endif">
                <p class="datum">{{$article->datum}}</p>
                <h2>{{$article->title}}</h2>
                <p>{{strip_tags($article->text)}}</p>
                <p class="datum_locatie">{{$article->tijdstip}} <strong>{{$article->locatie}}</strong></p>

                <a href="{{url('/article/'.$article->id.'/edit')}}"><img src="/images/edit.png" alt=""></a>
                <a href="{{url('/article/'.$article->id)}}"><img src="/images/garbage.png" alt=""></a>
                @if(Auth::check() && Auth::User()->id==$article->user_id && $article->active == 0)
                <span class="btn btn-primary btn-sm jsActive" data-id="{{$article->id}}">
Active
</span>
@endif
              </div>
            </div>
          </a>
        </div>
      
      @endforeach


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
