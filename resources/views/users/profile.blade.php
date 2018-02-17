<section class="content" id="profile">

<div class="inner-box">
    <div class="useradmin">
        <h3><a href="#">
            <img class="userimg" src="{{url('/img/logo.png')}}" alt />{{$user->name}}
        </a></h3>
    </div>
</div>

<div id="accordion" class="panel-group">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="#collapseA1" data-toggle="collapse">My Details</a></h4>
        </div>
        <div class="panel-collapse collapse in" id="collapseA1">
            <div class="panel-body">
                <form role="form" method="POST" action="{{ url('/profile_update') }}" class="login-form">
                  {{ csrf_field() }}
                  <!-- Full Name -->
                  <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="input-icon">
                      <i class="icon fa fa-drivers-license-o"></i>
                      <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Full Name">
                      @if ($errors->has('name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                     </div>
                  </div>

                  <!-- Username -->
                  <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                    <div class="input-icon">
                      <i class="icon fa fa-user"></i>
                      <input type="text" id="username" class="form-control" value="{{$user->username}}" name="username" placeholder="Username">
                      @if ($errors->has('username'))
                          <span class="help-block">
                              <strong>{{ $errors->first('username') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>

                  <!-- Email -->
                  <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="input-icon">
                      <i class="icon fa fa-envelope"></i>
                      <input type="text" id="email" class="form-control" value="{{$user->email }}" name="email" placeholder="Email Address">
                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>

                  <button class="btn btn-common log-btn">Update</button>
                </form>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="#collapseB1" class="collapsed" aria-expanded="false" data-toggle="collapse">Settings</a></h4>
        </div>
        <div class="panel-collapse collapse" aria-expanded="false" id="collapseB1">
            <div class="panel-body">
                <!-- Form here -->
                <p>
                    Coming soon!
                </p>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="#collapseC1" class="collapsed" aria-expanded="false" data-toggle="collapse">Preferences</a></h4>
        </div>
        <div class="panel-collapse collapse" aria-expanded="false" id="collapseC1">
            <div class="panel-body">
                <!-- Form here -->
                <p>
                    Coming soon!
                </p>
            </div>
        </div>
    </div>
</div>
</section>
