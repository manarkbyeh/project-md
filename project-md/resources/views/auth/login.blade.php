@extends('main') @section('content')
    <br>
    <br>
    <br>
    <br>

    <div class="container">



        <h1>Aanmelden</h1>


        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Email adres</label>

                <div class="col-md-12">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus> @if ($errors->has('email'))
                        <span class="help-block">
<strong>{{ $errors->first('email') }}</strong>
</span> @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Wachtwoord</label>

                <div class="col-md-12">
                    <input id="password" type="password" class="form-control" name="password" required> @if ($errors->has('password'))
                        <span class="help-block">
<strong>{{ $errors->first('password') }}</strong>
</span> @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}> Onthoud mij
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12 col-md-offset-4">
                    <button type="submit" class="btn btn-success">
                        AANMELDEN
                    </button>
                    <a class="btn btn-link green" href="{{ route('password.request') }}">
                        Bent u uw wachtwoord vergeten?
                    </a>
                </div>
            </div>
        </form>


    </div>
@endsection