@extends('layouts.app')

@section('content')

<!-- *****************************************************************************************************************
	 HEADERWRAP
	 ***************************************************************************************************************** -->

	 <?php
	 	// Get cities by IP
		$geobytes = new geocoding;
		$cities = $geobytes->getNearbyCitiesByIP();
		$categories->prepend('All Categories', 0);
	 ?>

	 <!-- Start intro section -->
	 <section id="intro" class="section-intro">
	  <div class="overlay">
	    <div class="container">
	      <div class="main-text">
	        <h1 class="intro-title">Welcome To <span style="color: #3498DB">Jobcore</span></h1>
	        <p class="sub-title">Connecting to your community starts here.</p>
	        <!-- Start Search bar -->
	        <div class="row search-bar">
	          <div class="advanced-search">
				{{ csrf_field() }}
  	            {!! Form::open(array('url' => '/jobs/search', 'class' => 'search-form')) !!}
	              <div class="col-md-3 col-sm-12 search-col">
	                <div class="input-group-addon search-category-container">
	                  <label class="styled-select">
						<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
							{!! Form::select('category', $categories,null,['class'=>'dropdown-product selectpicker']) !!}
						</div>
	                  </label>
	                </div>
	              </div>
		             <div class="col-md-4 col-sm-12 search-col">
						<div class="input-group-addon search-category-container">
							<label class="styled-select location-select">
								<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
									<select class="dropdown-product selectpicker" name="city" id="city">
										<option value="0">All Cities</option>
										@foreach($cities as $city)
											<option value="{{$city}}">{{$city}}</option>
										@endforeach
									</select>
								</div>
							</label>
						</div>
					</div>

	              <div class="col-md-4 col-sm-12 search-col">
					{!! Form::submit('Search', array('class'=>'btn btn-common btn-search btn-block'))!!}
	              </div>
	             {!! Form::close() !!}
	          </div>
	        </div>
	        <!-- End Search box -->
	      </div>
	    </div>
	  </div>
	 </section>
	 <!-- end intro section -->

	 <!-- Start Services Section -->
	 <div class="features">
		 <div class="container">
			 <div class="row">
				 <div class="col-md-4 col-sm-6">
					 <div class="features-box wow fadeInDownQuick" data-wow-delay="0.3s">
						 <div class="features-icon">
							 <i class="fa fa-hashtag">
							 </i>
						 </div>
						 <div class="features-content">
							 <h4>
								 Countless opportunities
							 </h4>
							 <p>
								With Jobcore you get access to countless opportunities to find work or get help when you need it.
							 </p>
						 </div>
					 </div>
				 </div>
				 <div class="col-md-4 col-sm-6">
					 <div class="features-box wow fadeInDownQuick" data-wow-delay="0.6s">
						 <div class="features-icon">
							 <i class="fa fa-paper-plane"></i>
						 </div>
						 <div class="features-content">
							 <h4>
								 Connect to your community
							 </h4>
							 <p>
								 Reach out to people in your local community to give a helping hand or create opportunities for other members.
							 </p>
						 </div>
					 </div>
				 </div>
				 <div class="col-md-4 col-sm-6">
					 <div class="features-box wow fadeInDownQuick" data-wow-delay="0.9s">
						 <div class="features-icon">
							 <i class="fa fa-map"></i>
						 </div>
						 <div class="features-content">
							 <h4>
								 You choose
							 </h4>
							 <p>
								 Pick what jobs you're interested in pursuing with the help of our category search to narrow your results.
							 </p>
						 </div>
					 </div>
				 </div>
				 <div class="col-md-4 col-sm-6">
					 <div class="features-box wow fadeInDownQuick" data-wow-delay="1.2s">
						 <div class="features-icon">
							 <i class="fa fa-cogs"></i>
						 </div>
						 <div class="features-content">
							 <h4>
								 Responsive Search
							 </h4>
							 <p>
								 Easily narrow your job search by choosing a category (or all of them!) and providing us your general location.
							 </p>
						 </div>
					 </div>
				 </div>
				 <div class="col-md-4 col-sm-6">
					 <div class="features-box wow fadeInDownQuick" data-wow-delay="1.5s">
						 <div class="features-icon">
							<i class="fa fa-hourglass"></i>
						 </div>
						 <div class="features-content">
							 <h4>
								 Anytime, anywhere
							 </h4>
							 <p>
								 Find work whenever and wherever it's convenient for you. From anywhere with your PC, laptop or phone.
							 </p>
						 </div>
					 </div>
				 </div>
				 <div class="col-md-4 col-sm-6">
					 <div class="features-box wow fadeInDownQuick" data-wow-delay="1.8s">
						 <div class="features-icon">
							 <i class="fa fa-suitcase"></i>
						 </div>
						 <div class="features-content">
							 <h4>
								 Be your own boss
							 </h4>
							 <p>
								 Create your own opportunities to work at your convenience or provide work for other members of your community.
							 </p>
						 </div>
					 </div>
				 </div>
			 </div>
		 </div>
	 </div>
	 <!-- End Services Section -->

	 <!-- Counter Section Start -->
	 <section id="counter">
		 <div class="container">
			 <div class="row">
				 <div class="col-md-3 col-sm-6 col-xs-12">
					 <div class="counting wow fadeInDownQuick" data-wow-delay=".5s">
						 <div class="icon">
							 <span>
								 <i class="lnr lnr-tag"></i>
							 </span>
						 </div>
						 <div class="desc">
							 <h3 class="counter">{{$job_count}}</h3>
							 <p>Regular Ads</p>
						 </div>
					 </div>
				 </div>
				 <div class="col-md-3 col-sm-6 col-xs-12">
					 <div class="counting wow fadeInDownQuick" data-wow-delay="1s">
						 <div class="icon">
							 <span>
								 <i class="lnr lnr-map"></i>
							 </span>
						 </div>
						 <div class="desc">
							 <h3 class="counter">{{$city_count}}</h3>
							 <p>Cities</p>
						 </div>
					 </div>
				 </div>
				 <div class="col-md-3 col-sm-6 col-xs-12">
					 <div class="counting wow fadeInDownQuick" data-wow-delay="1.5s">
						 <div class="icon">
							 <span>
								 <i class="lnr lnr-users"></i>
							 </span>
						 </div>
						 <div class="desc">
							 <h3 class="counter">{{$user_count}}</h3>
							 <p>Regular Members</p>
						 </div>
					 </div>
				 </div>
				 <div class="col-md-3 col-sm-6 col-xs-12">
					 <div class="counting wow fadeInDownQuick" data-wow-delay="2s">
						 <div class="icon">
							 <span>
								 <i class="lnr lnr-license"></i>
							 </span>
						 </div>
						 <div class="desc">
							 <h3 class="counter">0</h3>
							 <p>Premium Ads</p>
						 </div>
					 </div>
				 </div>
			 </div>
		 </div>
	 </section>
	 <!-- Counter Section End -->



@endsection
