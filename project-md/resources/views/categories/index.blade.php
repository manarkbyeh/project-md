@extends('main') @section('title', '| Categorieën') @section('content')

<div class="row">
  <div class="col-md-8">
    <h1>Categories</h1>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($categories as $category)
        <tr>
          <th>{{ $category->id }}</th>
          <td>{{ $category->name }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- end of .col-md-8 -->

  <div class="col-md-3">
    <div class="well">
   
      {!! Form::open(array('route' => 'categories.store', 'data-parsley-validate' => '', 'files' => true)) !!}
      <h2>New Category</h2> {{ csrf_field() }} 
 

      <div class="form-group  has-feedback">
      <label class="control-label">Foto</label>
      <div class="input-group" id="img" style="padding:0 ">
        <input type="text" class="form-control" readonly="true" />
        <label class="input-group-btn" style="display: table-cell;">
        <span class="btn btn-success">Browse&hellip;
          <input type="file" name="pic" Style="display: none;" accept="image/x-png,image/gif,image/jpeg" />
      
        </span>
        </label>
      </div>
      <small id="fileHelp" class="form-text text-muted">Kies hier een afbeelding voor uw munchie.</small>
    </div>

      {{ Form::label('name', 'Name:') }} {{ Form::text('name', null, ['class' => 'form-control']) }}
       {{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }} {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection @section('scripts') {!! Html::script('js/parsley.min.js') !!} @endsection