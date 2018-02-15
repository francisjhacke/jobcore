@extends('layouts.app')

@section('content')


<section id="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4">
        <div class="page-login-form box">
          <h3>
            Login
          </h3>
          <form role="form" method="POST" action="{{ url('/login') }}" class="login-form">
            {{ csrf_field() }}

            <!-- Username or email -->
            <div class="form-group {{ $errors->has('login') ? ' has-error' : '' }}">
              <div class="input-icon">
                <i class="icon fa fa-user"></i>
                <input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}" placeholder="Email or Username" class="form-control" placeholder="Username or Email">
                @if ($errors->has('login'))
                    <span class="help-block">
                        <strong>{{ $errors->first('login') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <!-- Password -->
            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
              <div class="input-icon">
                <i class="icon fa fa-unlock-alt"></i>
                <input id="password" type="password" class="form-control" name="password" placeholder="Password">
              </div>
            </div>

            <!-- Remember me checkbox -->
            <div class="checkbox">
              <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : ''}} style="float: left;">
              <label for="remember">Remember me</label>
            </div>

            <!-- Submit Button -->
            <button class="btn btn-common log-btn">Submit</button>
          </form>
          <ul class="form-links">
            <li class="pull-left"><a href="{{ url('/register') }}">Don't have an account?</a></li><br/>
            <li class="pull-left"><a href="{{ url('/password/reset') }}">Lost your password?</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
