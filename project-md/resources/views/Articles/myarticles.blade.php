@extends('main') @section('title', '| Mijn munchies') @section('content')


    <section id="vandaag">
        <div class="container extra">


            <p>
                <a href="{{url('/')}}" class="green">Home</a> > <a href="" class="green">Profiel</a> > Mijn munchies
            </p>

            <div class="row">
                <h1 class="orange col-md-6">Mijn munchies <a href="{{url('/article/create')}}" class="btn btn-success">TOEVOEGEN</a></h1>
            </div>
            <div class="row">


                @foreach($articles as $article)

                    <?php
                    $current_date = Carbon\Carbon::now();
                    $current_date = $current_date->toDateString();
                    ?>


                    <div class="col-md-4">
                        <a href="{{url('/article/'.$article->id.'/edit')}}">
                            <div class="artikel">
                                <div class="foto">
                                    <img src="{{url('/images/'.$article->pic)}}" alt="munchie" class="@if( $article->active== 1 || $article->datum < $current_date) deactiveren @endif">
                                </div>
                                <div class="artikel-content @if( $article->active== 1 || $article->datum < $current_date) deactiveren @endif">
                                    <p class="datum"> {{ Carbon\Carbon::parse($article->datum)->format('d-m-Y') }}</p>
                                    <h2>{{ (strlen($article->title)>15) ? substr(strip_tags($article->title), 0, 40).'...' :strip_tags($article->title)}}</h2>
                                    <p>{{ (strlen($article->text)>60) ? substr(strip_tags($article->text), 0, 60).'...' :strip_tags($article->text)}}</p>
                                    <p class="datum_locatie">{{$article->tijdstip}} <strong>{{$article->locatie}}</strong></p>


                                    <?php
                                    if($article->datum >= $current_date){ ?>
                                    <?php } else
                                    { ?>
                                    <h5>Dit product is vervallen</h5>
                                    <?php } ?>


                                    <div class="btn-group-sm">
                                        <form action="{{url('/article/'.$article->id)}}" method="post">
                                            {{csrf_field()}} {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-sm btn-danger" title="">
                                                <img src="{{asset('/images/garbage-white.png')}}" alt="verwijder munchie">
                                            </button>

                                            @if(Auth::check() && Auth::User()->id==$article->user_id && $article->active == 0)
                                            <a class="btn btn-sm btn-success" href="{{url('/article/'.$article->id.'/edit')}}">
                                                <img src="{{asset('/images/edit-white.png')}}" alt="wijzig munchie">
                                            </a>


                                            <span class="btn btn-sm btn-warning jsActive" data-id="{{$article->id}}">
                                                 <img src="{{asset('/images/tick-white.png')}}" alt="voltooi dit verzoek">
                                            </span>
                                        @endif
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach


            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var root = "{{ url('article/')}}" + "/";
            $('span.jsActive').click(function() {
                var id = this.dataset.id,
                    self = this;
                $.ajax({
                    url: root + id + '/active',
                    method: "get"
                }).done(function(msg) {
                    if (msg == 'true') {
                        self.parentElement.removeChild(self);
                    } else {
                        alert("Try again");
                    }
                }).fail(function(jqXHR, textStatus) {
                    alert("Try again");
                });
            });
        });
    </script>
@endsection