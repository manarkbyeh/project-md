@extends('main') @section('title', '| Nieuw verzoek') @section('content')



    <div class="container extra">
        <h1 class="">Verzoek<small> {{ $article->title }} </small></h1>

        <p class="lead">
            U staat op het punt om {{$article->title}} te verzoeken. Dit wilt zeggen dat u een afspraak wilt maken
            om de munchie te komen ophalen. Vul het onderstaande formulier in om de communicatie met de eigenaar
            te beginnen.
        </p>


        {!! Form::open(array('route' => 'transaction.store', 'id' => 'transaction', 'files' => true)) !!}


        <div class="form-group  has-feedback">
            {{ Form::hidden('article_id', $article->id)}} {{ Form::hidden('user_giver_id', $article->user_id)}}

            <label class=" control-label">Ophaaldatum (*)</label>

            <div class="input-group date">
                {{ Form::date('datum',old('datum'),array('class' =>'form-control', 'min' => '2017-11-04', 'max'=>'2018-04-20', 'required' => ''))}}
            </div>

            <small id="fileHelp" class="form-text text-muted">Wanneer wil je de munchie ophalen? (De munchie is houbaar tot: {{$article->datum}})</small>
        </div>
        <div class="form-group  has-feedback">
            <label class=" control-label">Gewenste uur (*)</label>
            {{ Form::time('uur',old('uur'),array('class' =>'form-control ', 'required' => '','maxlength'=>'255'))}}
            <small id="fileHelp" class="form-text text-muted">Hou rekening met het gewenste uur van de eigenaar: {{$article->tijdstip}}</small>
        </div>

        <div class="form-group  has-feedback">
            <label class=" control-label">Bericht aan eigenaar (*)</label>
            {{ Form::textarea('comment',old('comment'),array('class' =>'form-control','required' => '','placeholder'=>'Hier kan je vragen stellen aan de eigenaar en/of vertel hem/haar hoeveel stuks je wenst.'))}}
        </div>




        {{ Form::submit('VERZOEK',array('class' =>'btn btn-success pull-left', 'style'=>'margin-top:20px'))}}
        {!! Form::close() !!}

    </div>

@endsection @section('scripts') 
<script type="text/javascript" src="{{ asset('js/jquery-validation/jquery.validate.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/jquery-validation/jquery.validate.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

      <script>
    $(document).ready(function() {
        $('#transaction').submit(function(e) {
            e.preventDefault();
        }).validate({
            
            rules: {
                datum: {
                  required: true,

                },
                comment: {
                  required: true,
                },
                

                uur: {
                  required: true,

                },
           
           


            },
            
            messages: {
                comment : 'moet een omschrijving bevatten.',
                uur : 'moet een uur bevatten.',
                datum :'moet een datum bevatten..',
                
            },
    
     /*   highlight: function (input) {
            $(input).parents('.field-group').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.field-group').removeClass('error');
        },
        errorPlacement: function (error, element) {

                $(element).parents('.field-group').parent().append(error);
        },*/

           submitHandler: function(form) {

              alert('go');
            }
    
        });

    });</script>
@endsection