@extends('main') @section('title', '| All Categories') @section('content')

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
      {{ Form::label('pic', 'Upload a Featured Image') }} {{ Form::file('pic') }}
      {{ Form::label('name', 'Name:') }} {{ Form::text('name', null, ['class' => 'form-control']) }}
       {{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }} {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection @section('scripts') {!! Html::script('js/parsley.min.js') !!} @endsection