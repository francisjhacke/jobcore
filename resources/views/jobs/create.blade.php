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
            {!! Form::open(array('action' => 'JobController@store', 'class' => 'form', 'name' => 'form_citydetails', 'id' => 'form_citydetails', 'enctype' => 'multipart/form-data')) !!}
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-2">
                <!-- Category dropdown-->
                <div class="features-box wow fadeInDownQuick" data-wow-delay="0.2s">
                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                        <i class="icon fa fa-circle-o-notch fa-spin"></i> <label for="category_id"> Category</label>
                        {!! Form::select('category_id', $categories,null,['class'=>'form-control']) !!}
                        @if ($errors->has('category_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-7">
                <!-- Title text area-->
                <div class="features-box wow fadeInDownQuick" data-wow-delay="0.4s">
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <i class="icon fa fa-certificate"></i> <label for="title"> Job Title</label>
                        <input id="title" type="text" class="form-control" name="title" placeholder="Shovel my driveway" placeholder='&#xf054; Title' value="{{ old('title') }}" required autofocus>
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <!-- Description text area -->
                <div class="features-box wow fadeInDownQuick" data-wow-delay="0.6s">
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <i class="icon fa fa-commenting-o"></i> <label for="description"> Details</label>
                        <textarea id="description" name="description" class="form-control" rows="3" value="{{old('description')}}" placeholder="The most detailed description ever created..." required></textarea>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                    <!-- Pay text area-->
                <div class="features-box wow fadeInDownQuick" data-wow-delay="0.8s">
                    <div class="form-group{{ $errors->has('pay') ? ' has-error' : '' }}">
                        <i class="icon fa fa-money"></i> <label for="pay"> Payment Amount ($)</label>
                        <input id="pay" type="text" class="form-control" placeholder="20.00" name="pay" value="{{ old('pay') }}" required autofocus>
                        @if ($errors->has('pay'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pay') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8">
                <!-- Location area -->
                <div class="features-box wow fadeInDownQuick" data-wow-delay="1.0s">
                    <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                        <i class="icon fa fa-address-book-o"></i> <label for="city"> Location</label>
                        <input class="ff_elem form-control" type="text" name="ff_nm_from[]" placeholder="City, Province/State, Country" value="" id="f_elem_city"/>
                        @if ($errors->has('location'))
                            <span class="help-block">
                                <strong>{{ $errors->first('location') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
        </div>
    </div>

<!--        <div class="row">





            City text area
                <div class="features-box wow fadeInDownQuick" data-wow-delay="1.0s">
                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        <i class="icon fa fa-address-book-o"></i> <label for="city"> City</label>
                        <input id="city" type="text" class="form-control" placeholder="Toronto" name="city" value="{{ old('city') }}" required autofocus>
                        @if ($errors->has('city'))
                            <span class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                Province/State text area
                <div class="features-box wow fadeInDownQuick" data-wow-delay="1.0s">
                    <div class="form-group{{ $errors->has('prov_state') ? ' has-error' : '' }}">
                        <i class="icon fa fa-address-book-o"></i> <label for="prov_state"> Province/State</label>
                        <input id="prov_state" type="text" class="form-control" placeholder="ON" name="prov_state" value="{{ old('prov_state') }}" required autofocus>
                        @if ($errors->has('prov_state'))
                            <span class="help-block">
                                <strong>{{ $errors->first('prov_state') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-4">
                Country text area
                <div class="features-box wow fadeInDownQuick" data-wow-delay="1.0s">
                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                        <i class="icon fa fa-address-book-o"></i> <label for="country"> Country</label>
                        <input id="country" type="text" class="form-control" placeholder="Canada" name="country" value="{{ old('country') }}" required autofocus>
                        @if ($errors->has('country'))
                            <span class="help-block">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>-->

        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                    <!-- When Date text area-->
                <div class="features-box wow fadeInDownQuick" data-wow-delay="1.0s">
                    <div class="form-group{{ $errors->has('booked_date') ? ' has-error' : '' }}">
                        <i class="icon fa fa-calendar"></i> <label for="booked_date"> Date</label>
                        <input id="booked_date" type="text" class="form-control" name="booked_date" placeholder="DD/MM/YYYY" value="{{ old('booked_date') }}" autofocus>
                        @if ($errors->has('booked_date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('booked_date') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                    <!-- When Time text area-->
                <div class="features-box wow fadeInDownQuick" data-wow-delay="1.0s">
                    <div class="form-group{{ $errors->has('whenTime') ? ' has-error' : '' }}">
                        <i class="icon fa fa-clock-o"></i> <label for="booked_time"> Time</label>
                        <input id="booked_time" type="text" class="form-control" name="booked_time" placeholder="HH:mm:ss" value="{{ old('time') }}" autofocus>
                        @if ($errors->has('booked_time'))
                            <span class="help-block">
                                <strong>{{ $errors->first('booked_time') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

            <!-- Post job button -->
        <div class="features-box wow fadeInDownQuick" data-wow-delay="1.1s">
            <div class="form-group text-center">
                {!! Form::submit('Post job', array('class' => 'btn btn-primary')) !!}
            </div>
        </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
