@extends('main') @section('title', '| View Post') @section('content')

<div class="container news_container">
  <h2 class="page_title">Nieuws</h2> @if(Auth::check() && Auth::user()->roles >1) @endif @if(Auth::check() && Auth::user()->roles ==1)
  <div class="col-xs-4 col-xs-offset-8 add_news_writer">
    <a href="{{route('Articles.create')}}" class="btn btn-block">Nieuws Toevoegen</a>
  </div>
  @endif

  <div class="row">

    <div class="container-fluid">

      <div class="col-xs-12 col-md-12 ">

        <div class="row">
          @foreach($articles as $n)
          <div class="clearfix"></div>
          <div class="cource-box">
            <div class="row cource-text">
              <div class="col-lg-4 col-md-4"> <a href="#" target="_blank"><img src="{{url('/images/'.$n->pic)}}" alt="" class="img-responsive"></a></div>

              <div class="col-lg-8 col-md-8">
                <h4><a href="#" target="_blank">{{$n->title}}</a></h4>
                <p>{{$n->text}}</p>
                <p>{{$n->category['name']}}</p>


                <a href="#" class="btn btn-small" target="_blank">Lees Meer</a>
              </div>
            </div>
          </div>

          @endforeach



        </div>

      </div>

    </div>
  </div>
</div>
</div>


@endsection