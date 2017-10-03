@extends('main') @section('title', '| Edit Article') @section('stylesheets') {!! Html::style('css/parsley.css') !!} @endsection @section('content')

<div class="row">
  {!! Form::model($articles, ['route' => ['article.update', $articles->id], 'data-parsley-validate' => '', 'method' => 'PATCH','files'=>true]) !!} {{ csrf_field() }}

  <div class="col-md-8">
    {{ Form::label('title', 'Title:') }} {{ Form::text('title', old('title'), ["class" => 'form-control input-lg', 'required' => '', 'maxlength' => '255']) }} {{ Form::label('text', "Body:", ['class' => 'form-spacing-top']) }} {{ Form::textarea('text',old('text'),
    ['class' => 'form-control','required' => '']) }} {{ Form::label('category_id',"Category:", ['class' => 'form-spacing-top']) }} {{ Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control']) }} {{ Form::label('pic','image
    post:',["class" => 'form-space'])}} {{ Form::file('pic')}}
  </div>

  <div class="col-md-4">
    <div class="well">
      <dl class="dl-horizontal">
        <dt>Created At:</dt>
        <dd>{{ date('M j, Y h:ia', strtotime($articles->created_at)) }}</dd>
      </dl>

      <dl class="dl-horizontal">
        <dt>Last Updated:</dt>
        <dd>{{ date('M j, Y h:ia', strtotime($articles->updated_at)) }}</dd>
      </dl>
      <hr>
      <div class="row">
        <div class="col-sm-6">
          {!! Html::linkRoute('article.show', 'Cancel', array($articles->id), array('class' => 'btn btn-danger btn-block')) !!}
        </div>
        <div class="col-sm-6">
          {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
        </div>
      </div>

    </div>
  </div>
  {!! Form::close() !!}
</div>
<!-- end of .row (form) -->

@endsection @section('scripts') {!! Html::script('js/parsley.min.js') !!} @endsection