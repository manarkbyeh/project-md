<<<<<<< HEAD
@extends('main') @section('title', '| View Post') @section('content')

<h1 class="my-4">Home<small> page</small></h1>
<!-- Blog Post -->
@foreach($articles as $n)
<div class="card mb-4">
  <img class="card-img-top" src="{{url('/images/'.$n->pic)}}" alt="Card image cap" style="width: 100%;height: 300px">
  <div class="card-body">
    <h2 class="card-title">{{$n->title}}</h2>
    <p class="card-text">{{strip_tags($n->text)}}</p>
    <a href="{{url('/article/'.$n->id)}}" class="btn btn-primary">Read More &rarr;</a>
=======
@extends('main') @section('title', '| All Posts') @section('content')

<div class="row">
  <div class="col-md-10">
    <h1>All Articles</h1>
    <p><a class="btn btn-success" href="{{ route('article.create') }}" role="button">Nieuw artikel toevoegen</a></p>
>>>>>>> 17fcf238a4bb2fe41b5cddd28d8c6be59a0251cf
  </div>
  <div class="card-footer text-muted">
    Posted on {{ date('M j, Y h:ia', strtotime($n->created_at)) }} by

<<<<<<< HEAD
  </div>
</div>
@endforeach @endsection
=======

</div>

<div class="row">
        @foreach ($articles as $post)

        <div class="col-md-4">
          <div>
              <a href="#"><img src="{{url('/images/'.$post['pic'])}}" alt="" class="img-fluid"></a>
              <h4>{{ $post->title }}</h4>
              <p>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</p>
              <p>{{ date('M j, Y', strtotime($post->created_at)) }}</p>
              <p><a class="btn btn-warning" href="{{ route('article.show', $post->id) }}" role="button">View</a>


            <a class="btn btn-info" href="{{ route('article.edit', $post->id) }}" role="button">Edit</a>

            <a class="btn btn-danger" href="{{ route('article.delete', $post->id) }}" role="button">Delete</a></p>


          </div>
        </div>

        @endforeach
        </div>

@stop
>>>>>>> 17fcf238a4bb2fe41b5cddd28d8c6be59a0251cf
