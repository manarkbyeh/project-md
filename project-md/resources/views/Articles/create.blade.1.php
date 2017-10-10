@extends('main') @section('title', '| Create New Post') @section('content')
<h2 class="page_title">Articles Toevoegen</h2> {!! Form::open(array('route' => 'article.store', 'data-parsley-validate' => '', 'files' => true)) !!}
<div class="form-group  has-feedback">
  <label class=" control-label">Title : </label>
  {{ Form::text('title',old('title'),array('class' =>'form-control ','maxlength'=>'255'))}}
</div>
<div class="form-group  has-feedback">
  <label class=" control-label">Inhoud: </label>
  {{ Form::textarea('text',old('text'),array('class' =>'form-control'))}}
</div>
<div class="form-group">
  <label class=" control-label">Category : </label>
  <select class="form-control" name="category_id">
    @foreach($categories as $category)
    <option value='{{ $category->id }}'>{{ $category->name }}</option>
    @endforeach
  </select>
</div>

<div class="form-group  has-feedback">
  <label class=" control-label">Image : </label>
  <div class="input-group" id="img" style="padding:0 ">
    <label class="input-group-btn" style="display: table-cell;">
      <span class="btn btn-primary">Browse&hellip;
<input type="file" name="pic" Style="display: none;" accept="image/x-png,image/gif,image/jpeg" />
</span>
    </label>
    <input type="text" class="form-control" readonly="true" />
  </div>
</div>
{{ Form::submit('Toevoegen',array('class' =>'btn btn-success pull-left', 'style'=>'margin-top:20px'))}}
<center><i class="fa fa-spinner fa-spin fa-2x loading hidden"></i></center>
{!! Form::close() !!} @endsection