@extends('layouts.app')

@section('content')

<?php
    // Get closest city based on users IP address
    //$myIpinfo = new geoplugin;
    //$details = $myIpinfo->locationInfo();
    //$loadCity = $details->geoplugin_city;
    //$loadRegion = $details->geoplugin_region;

    // Get Latitude and Longitude based on city+region found
    //$myLongLat = new geocoding;
    //$myLongLat = $myLongLat->LatLongFinderByAddress($loadCity+","+$loadRegion);

?>


<section id="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
        <div class="page-login-form box">


            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

          <h3>Post a job</h3>
         <!-- <form class="login-form" role="form" method="POST" action="{{ url('/jobs/create') }}">-->
            {{ csrf_field() }}
            {!! Form::open(array('action' => 'JobController@store', 'class' => 'form')) !!}
            <!-- Category dropdown-->
            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                <i class="icon fa fa-circle-o-notch fa-spin"></i> <label for="category_id"> Category</label>
                {!! Form::select('category_id', $categories,null,['class'=>'form-control']) !!}
                @if ($errors->has('category_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Title text area-->
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <i class="icon fa fa-certificate"></i> <label for="title"> Title</label>
                <input id="title" type="text" class="form-control" name="title" placeholder="Shovel my driveway" placeholder='&#xf054; Title' value="{{ old('title') }}" required autofocus>
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Description text area -->
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <i class="icon fa fa-commenting-o"></i> <label for="description"> Description</label>
                <textarea id="description" name="description" class="form-control" rows="3" value="{{old('description')}}" placeholder="The most detailed description ever created..." required></textarea>
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Address text area-->
            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <i class="icon fa fa-address-book-o"></i> <label for="address"> Address</label>
                <input id="address" type="text" class="form-control" placeholder="100 Yonge St, Toronto, ON" name="address" value="{{ old('address') }}" required autofocus>
                @if ($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Pay text area-->
            <div class="form-group{{ $errors->has('pay') ? ' has-error' : '' }}">
                <i class="icon fa fa-money"></i> <label for="pay"> Payment</label>
                <input id="pay" type="text" class="form-control" placeholder="20.00" name="pay" value="{{ old('pay') }}" required autofocus>
                @if ($errors->has('pay'))
                    <span class="help-block">
                        <strong>{{ $errors->first('pay') }}</strong>
                    </span>
                @endif
            </div>

            <!-- When Date text area-->
            <div class="form-group{{ $errors->has('booked_date') ? ' has-error' : '' }}">
                <i class="icon fa fa-calendar"></i> <label for="booked_date"> Date</label>
                <input id="booked_date" type="text" class="form-control" name="booked_date" placeholder="DD/MM/YYYY" value="{{ old('booked_date') }}" required autofocus>
                @if ($errors->has('booked_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('booked_date') }}</strong>
                    </span>
                @endif
            </div>

            <!-- When Time text area-->
            <div class="form-group{{ $errors->has('whenTime') ? ' has-error' : '' }}">
                <i class="icon fa fa-clock-o"></i> <label for="booked_time"> Time</label>
                <input id="booked_time" type="text" class="form-control" name="booked_time" placeholder="HH/mm" value="{{ old('time') }}" required autofocus>
                @if ($errors->has('booked_time'))
                    <span class="help-block">
                        <strong>{{ $errors->first('booked_time') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Post job button -->
            <div class="form-group text-center">
                {!! Form::submit('Post job', array('class' => 'btn btn-primary')) !!}
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
