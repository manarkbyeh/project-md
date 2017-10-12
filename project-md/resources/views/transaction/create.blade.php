@extends('main') @section('title', '| Create New Post') @section('stylesheets') {!! Html::style('css/parsley.css') !!} @endsection @section('content')

<h1 class="my-4">Order<small> {{ $article->title }} </small></h1> {!! Form::open(array('route' => 'transaction.store', 'data-parsley-validate' => '', 'files' => true)) !!}
<div class="form-group  has-feedback">
  {{ Form::hidden('article_id', $article->id)}} {{ Form::hidden('user_giver_id', $article->user_id)}}
  <label class=" control-label">aantal : </label>
  {{ Form::text('aantal',old('aantal'),array('class' =>'form-control ','maxlength'=>'255','required' => ''))}}
</div>
<div class="form-group  has-feedback">
  <label class=" control-label">Date : </label>
  {{ Form::date('datum',old('datum'),array('class' =>'form-control ', 'required' => '','maxlength'=>'255'))}}
</div>
<div class="form-group  has-feedback">
  <label class=" control-label">uur : </label>
  {{ Form::time('uur',old('uur'),array('class' =>'form-control ', 'required' => '','maxlength'=>'255'))}}
</div>

<div class="form-group  has-feedback">
  <label class=" control-label">commentaar: </label>
  {{ Form::textarea('comment',old('comment'),array('class' =>'form-control','required' => ''))}}
</div>




{{ Form::submit('Toevoegen',array('class' =>'btn btn-success pull-left', 'style'=>'margin-top:20px'))}}
<center><i class="fa fa-spinner fa-spin fa-2x loading hidden"></i></center>
{!! Form::close() !!} @endsection @section('scripts') {!! Html::script('js/parsley.min.js') !!} @endsection