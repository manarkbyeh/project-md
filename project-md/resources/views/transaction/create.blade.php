@extends('main') @section('title', '| Create New Post') @section('stylesheets') {!! Html::style('css/parsley.css') !!} @endsection @section('content')



  <div class="container extra">
<h1 class="">Verzoek<small> {{ $article->title }} </small></h1>

    <p class="lead">
      U staat op het punt om {{$article->title}} te verzoeken. Dit wilt zeggen dat u een afspraak wilt maken
      om de munchie te komen ophalen. Vul het onderstaande formulier in om de communicatie met de eigenaar
      te beginnen.
    </p>


    {!! Form::open(array('route' => 'transaction.store', 'data-parsley-validate' => '', 'files' => true)) !!}


<div class="form-group  has-feedback">
  {{ Form::hidden('article_id', $article->id)}} {{ Form::hidden('user_giver_id', $article->user_id)}}

  <label class=" control-label">Ophaaldatum</label>
  {{ Form::date('datum',old('datum'),array('class' =>'form-control ', 'required' => '','maxlength'=>'255'))}}
  <small id="fileHelp" class="form-text text-muted">Wanneer wil je de munchie ophalen? (De munchie is houbaar tot: {{$article->datum}})</small>
</div>
<div class="form-group  has-feedback">
  <label class=" control-label">Gewenste uur</label>
  {{ Form::time('uur',old('uur'),array('class' =>'form-control ', 'required' => '','maxlength'=>'255'))}}
  <small id="fileHelp" class="form-text text-muted">Hou rekening met het gewenste uur van de eigenaar: {{$article->tijdstip}}</small>
</div>

<div class="form-group  has-feedback">
  <label class=" control-label">Bericht aan eigenaar</label>
  {{ Form::textarea('comment',old('comment'),array('class' =>'form-control','required' => '','placeholder'=>'Hier kan je vragen stellen aan de eigenaar en/of vertel hem/haar hoeveel stuks je wenst.'))}}
</div>




{{ Form::submit('VERZOEK',array('class' =>'btn btn-success pull-left', 'style'=>'margin-top:20px'))}}
<center><i class="fa fa-spinner fa-spin fa-2x loading hidden"></i></center>
{!! Form::close() !!}

 </div>

@endsection @section('scripts') {!! Html::script('js/parsley.min.js') !!} @endsection