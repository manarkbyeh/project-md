@extends('main') @section('title', '| Edit Blog Post') @section('content')

  <div class="container extra">


    <h2 class="page_title green">Munchie Wijzigen</h2>

    <p class="lead">
      Hebt u een foutje gemaakt? Hier kunt u uw artikel aanpassen.
    </p>


    {!! Form::model($articles, ['route' => ['article.update', $articles->id], 'method' => 'PATCH','files'=>true]) !!}





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



    <div class="form-group  has-feedback">

      <label class=" control-label">Titel munchie</label>
      {{ Form::text('title',old('title'),array('class' =>'form-control ', 'required' => '','maxlength'=>'255'))}}
      <small id="fileHelp" class="form-text text-muted">Kies een passende titel.</small>

    </div>



    <div class="form-group  has-feedback">
      <label class=" control-label">Omschrijving </label>
      {{ Form::textarea('text',old('text'),array('class' =>'form-control', 'required' => '', 'placeholder'=>'Geef hier een korte omschrijving van het product en vertel ons waarom je het product weg wilt geven.'))}}
    </div>


    <div class="form-group  has-feedback">
      <label class=" control-label"> Houdbaarheidsdatum </label>
      {{ Form::date('datum',old('datum'),array('class' =>'form-control ', 'required' => '','maxlength'=>'255'))}}
      <small id="fileHelp" class="form-text text-muted">Tot op welke datum is dit artikel goed?</small>
    </div>

    <div class="form-group has-feedback">
      <label class=" control-label">Categorie</label>
      <select class="form-control" name="category_id">
        @foreach($categories as $category)
          <option value='{{ $category->id }}'>{{ $category->name }}</option>
        @endforeach
      </select>
    </div>




    <div class="form-group">
      <label class=" control-label"> Tijdstip </label>
      {{ Form::text('tijdstip',old('tijdstip'),array('class' =>'form-control ', 'required' => '','maxlength'=>'255'))}}
      <small id="fileHelp" class="form-text text-muted">Om hoe laat mogen ze dit artikel komen halen?</small>
    </div>






    {{ Form::submit('WIJZIGEN',array('class' =>'btn btn-success pull-left', 'style'=>'margin-top:20px'))}}
    <center><i class="fa fa-spinner fa-spin fa-2x loading hidden"></i></center>
    {!! Form::close() !!}




  </div>


@endsection