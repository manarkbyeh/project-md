@extends('main') @section('title', '| View Article') @section('content')


<div class="row">



  <div class="col-md-8">
    <div class="row">
      <div class="clearfix"></div>
      <div class="section-lg m-bottom10">
        <div class="container">
          <div class="row">

            <div class="col-lg-12 col-md-12">
              <div class="cource-box">
                <div class="row cource-text">
                  <div class="col-lg-4 col-md-4 image_box">
                    <a href="#"><img src="{{url('/images/'.$article['pic'])}}" alt="" class="img-responsive detail_img"></a>
                  </div>
                  <div class="col-lg-8 col-md-8">

                    <h4>{{$article->title}}</h4>
                    <p>{{$article->text}}</p>

                  </div>
                  <div class="pull-right">
                    @if(Auth::check() && Auth::user()->roles > 0 && Auth::user()->roles == 1)
                    <a href="{{route('article.edit',$article->id)}}" class="btn btn-primary btn-sm">
                      <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                    </a>

                    <a href="{{route('article.delete',$article->id)}}" class="btn colorred  btn-sm">
                      <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                    </a>
                    @endif @if(Auth::check() && Auth::user()->roles ==2 and $news->active == 0)
                    <span class="btn btn-primary btn-sm jsActive" data-id="{{$article->id}}">
Active
</span> @endif @if(Auth::check() && Auth::user()->roles == 1 and $article->active == 0)
                    <span class="btn btn-default btn-sm">pending</span> @endif
                  </div>

                </div>
              </div>
            </div>


          </div>
        </div>
      </div>

      @endsection