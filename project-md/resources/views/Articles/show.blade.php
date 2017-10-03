@extends('main') @section('title', '| View Article') @section('content')

<!-- Title -->
<h1 class="mt-4">{{$articles->title}}</h1>

<!-- Author -->
<p class="lead">

</p>

<hr>

<!-- Date/Time -->
<p>Posted on {{ date('M j, Y h:ia', strtotime($articles->created_at)) }}</p>

<hr>

<!-- Preview Image -->
<img class="img-fluid rounded" src="{{url('/images/'.$articles['pic'])}}" alt="">

<<<<<<< HEAD
<hr>

<!-- Post Content -->
<p class="lead">{{strip_tags($articles->text)}} </p>
<hr> @endsection
=======
              <div class="col-lg-12 col-md-12">
                <div class="cource-box">
                  <div class="row cource-text">


                    <div class="col-lg-6">
                      <a href="#"><img src="{{url('/images/'.$article['pic'])}}" alt="" class="img-fluid"></a>
                        <h4>{{$article->title}}</h4>
                        <p>{{$article->text}}</p>
                        <p><a class="btn btn-warning" href="" role="button">Aanvraag doen</a></p>
                    </div>


                    <div class="pull-right">
                      @if(Auth::check() && Auth::user()->roles > 0 && Auth::user()->roles == 1)
                      <a href="{{route('article.edit',$article->id)}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                      </a>

                      <a href="{{route('article.delete',$article->id)}}" class="btn colorred  btn-sm">
                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                      </a>
                      @endif @if(Auth::check() && Auth::user()->roles ==2 and $news->active == 0)
                      <span class="btn btn-primary btn-sm jsActive" data-id="{{$article->id}}">
Active
</span> @endif @if(Auth::check() && Auth::user()->roles == 1 and $article->active == 0)
                      <span class="btn btn-default btn-sm">pending</span> @endif
                    </div>

                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>

      </div>
    </div>
</div>


        <script>
          $(document).ready(function() {
            var root = "{{ url('news/')}}" + "/";
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
>>>>>>> 17fcf238a4bb2fe41b5cddd28d8c6be59a0251cf
