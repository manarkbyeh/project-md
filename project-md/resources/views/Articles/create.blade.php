@extends('main') @section('title', '| Create New Article') @section('stylesheets') {!! Html::style('css/parsley.css') !!} @endsection @section('content')
<main class="" id="main-collapse">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      {!! Form::open(array('route' => 'article.store', 'data-parsley-validate' => '', 'files' => true)) !!} {{ csrf_field() }} {{ Form::label('title','Titel')}} {{ Form::text('title',old('title'),array('class' =>'form-control ', 'required' => '', 'maxlength'
      => '255'))}} {{ Form::label('text','Inhoud',["class" => 'form-space'])}} {{ Form::textarea('text',old('text'),array('class' =>'form-control', 'required' => ''))}} {{ Form::label('pic','foto',["class" => 'form-space'])}} {{ Form::label('category_id',
      'Category:') }}
      <select class="form-control" name="category_id">
        @foreach($categories as $category)
        <option value='{{ $category->id }}'>{{ $category->name }}</option>
        @endforeach

      </select>
      {{ Form::file('pic')}} {{ Form::submit('Toevoegen',array('class' =>'btn btn-success btn-lg bottom_buttom btn-block', 'style'=>'margin-top:20px'))}}
      <center><i class="fa fa-spinner fa-spin fa-2x loading hidden"></i></center>
      {!! Form::close() !!}
    </div>
  </div>
</main>
@endsection @section('scripts') {!! Html::script('js/parsley.min.js') !!} @endsection