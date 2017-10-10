@extends('main') @section('title', '| Edit Blog Post') @section('content')
<div class="row ">

  @foreach($articles as $n)

  <div class="col-xs-12 col-md-6 mb-4">
    <div class="card">
      <img class="card-img-top" src="{{url('/images/'.$n->pic)}}" style="height:190px" alt="">
      <div class="card-body">
        <h4 class="card-title">{{$n->title}}</h4>
        <p class="card-text">{{strip_tags($n->text)}}</p>
      </div>
      <div class="card-footer text-center">
        <form action="{{url('/article/'.$n->id)}}" method="post">
          {{csrf_field()}} {{method_field('DELETE')}}
          <a href="{{url('/article/'.$n->id)}}" class="btn btn-primary" title="">Show</a>
          <a href="{{url('/article/'.$n->id.'/edit')}}" class="btn btn-warning" title="">Edite</a>
          <button type="submit" class="btn btn-danger" title="">Delete</button>
        </form>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection