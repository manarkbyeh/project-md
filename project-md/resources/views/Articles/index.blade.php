@extends('main') @section('title', '| All Posts') @section('content')

<div class="row">
  <div class="col-md-10">
    <h1>All Articles</h1>
    <p><a class="btn btn-success" href="{{ route('article.create') }}" role="button">Nieuw artikel toevoegen</a></p>
  </div>


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