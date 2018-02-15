@extends('layouts.app')

@section('content')


<!-- Content section Start -->
 <section id="content">
   <div class="container">
     <div class="row">
       <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
         <div class="page-login-form box">
           <h3>
             Register
           </h3>
           <form role="form" method="POST" action="{{ url('/register') }}" class="login-form">
             {{ csrf_field() }}

             <!-- Full Name -->
             <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
               <div class="input-icon">
                 <i class="icon fa fa-drivers-license-o"></i>
                 <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name">
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
                 <input type="text" id="username" class="form-control" value="{{old('username')}}" name="username" placeholder="Username">
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
                 <input type="text" id="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Email Address">
                 @if ($errors->has('email'))
                     <span class="help-block">
                         <strong>{{ $errors->first('email') }}</strong>
                     </span>
                 @endif
               </div>
             </div>

             <!-- Password -->
             <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
               <div class="input-icon">
                 <i class="icon fa fa-unlock-alt"></i>
                 <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                 @if ($errors->has('password'))
                     <span class="help-block">
                         <strong>{{ $errors->first('password') }}</strong>
                     </span>
                 @endif
               </div>
             </div>

             <!-- Confirm Password -->
             <div class="form-group">
               <div class="input-icon">
                 <i class="icon fa fa-unlock-alt"></i>
                 <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Confirm Password">
               </div>
             </div>
             <div class="checkbox">
               <input type="checkbox" id="remember" name="rememberme" value="forever" style="float: left;">
               <label for="remember">By creating account you agree to our Terms &amp; Conditions</label>
             </div>
             <button class="btn btn-common log-btn">Register</button>
           </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- Content section End -->

@endsection
