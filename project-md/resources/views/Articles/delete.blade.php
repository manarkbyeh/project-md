@extends('main') @section('title', '| Edit Blog Post') @section('stylesheets') {!! Html::style('css/select2.min.css') !!}

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'link code',
    menubar: false
  });
</script>

@endsection @section('content')
<div class="container">
  <div class="success"></div>
  <div class="row delete_news_div">
    <h1>{{$articles->title}}</h1>
    <p> {{$articles->text}}</p>

    <script>
      formajax("deletenews", "deletenewsbtn", '{{url("news")}}');
    </script>

    {{ Form::open(['route'=>['article.destroy',$articles->id],"id"=>"deletenews",'method'=>'Delete'])}} {{Form::submit('Verwijderen',["class" => 'btn btn-block btn-sm deletenewsbtn'])}} {{Form::close()}}

  </div>
</div>
@endsection