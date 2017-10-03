@extends('main') @section('title', '| Edit Blog Post') @section('content')

<h2 class="page_title">Edit Article </h2>
<div class="row">
  {!! Form::model($articles, ['route' => ['article.update', $articles->id], 'method' => 'PATCH','files'=>true]) !!} {!! Form::model($articles,['route'=>['article.update',$articles->id],'method' => 'PATCH','files'=>true]) !!} {{ Form::label('title', 'Title:')
  }} {{ Form::text('title', old('title'), ["class" => 'form-control input-lg']) }} {{ Form::label('text', "Body:", ['class' => 'form-spacing-top']) }} {{ Form::textarea('text',old('text'), ['class' => 'form-control']) }}
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
  {!! Form::close() !!}
</div>
<!-- end of .row (form) -->



@endsection