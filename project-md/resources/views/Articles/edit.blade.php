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

<div class="row">
  {!! Form::model($articles, ['route' => ['article.update', $articles->id], 'method' => 'PATCH','files'=>true]) !!} {!! Form::model($articles,['route'=>['article.update',$articles->id],'method' => 'PATCH','files'=>true]) !!}

  <div class="col-md-8">
    {{ Form::label('title', 'Title:') }} {{ Form::text('title', old('title'), ["class" => 'form-control input-lg']) }} {{ Form::label('text', "Body:", ['class' => 'form-spacing-top']) }} {{ Form::textarea('text',old('text'), ['class' => 'form-control']) }}
    {{ Form::label('category_id',"Category:", ['class' => 'form-spacing-top']) }} {{ Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control']) }} {{ Form::label('pic','image post:',["class" => 'form-space'])}} {{ Form::file('pic')}}
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

@stop @section('scripts') {!! Html::script('js/select2.min.js') !!}

<script type="text/javascript">
  $('.select2-multi').select2();
</script>

@endsection