@extends('layouts.app')

@section('content')

<section id="content">
  <div class="container">
  <div class="row">
  <div class="col-sm-12 col-md-12">
  <div class="content-box">
    <hgroup class="mb20">
        <h1 class="search-results-title">Search Results</h1>
    	<h2 class="lead"><strong class="text-danger">{{count($jobs)}}</strong> results were found for <strong class="text-danger">Jobs</strong></h2>
    </hgroup>
    <?php $index = count($jobs); ?>
    @foreach ($jobs as $job)
    	<article class="search-result row">
    		<div class="col-xs-12 col-sm-12 col-md-3">
            <?php if ($job->category_id == 1):?>
    			<a href="#" title="Lorem ipsum" class="thumbnail"><img src="{{url('/img/logo.png')}}" alt="Image"/></a>
            <?php else:?>
                <a href="#" title="Lorem ipsum" class="thumbnail"><img src="{{url('/img/logo.png')}}" alt="Image"/></a>
            <?php endif;?>
    		</div>
    		<div class="col-xs-12 col-sm-12 col-md-2">
    			<ul class="meta-search">
                    <?php if($job->booked_date != ""): ?>
    				    <li><i class="glyphicon glyphicon-calendar"></i> <span>{{date("F j, Y",strtotime($job->booked_date))}}</span></li>
                    <?php endif; ?>
                    <?php if($job->booked_time != ""): ?>
    				    <li><i class="glyphicon glyphicon-time"></i> <span>{{date("g:i a", strtotime($job->booked_time))}}</span></li>
                    <?php endif;?>
    				<li> <i class="fa fa-map"></i> <span class="s-city">{{$job->city}}</span></li>
                    <li><i class="glyphicon glyphicon-flag"></i> <span class="s-loc">{{strtoupper($job->prov_state)}}</span>, <span class="s-country">{{$job->country}}</span></li>
                    <li><i class="glyphicon glyphicon-usd"></i> <span>{{number_format($job->pay, 2)}}</span></li>
    			</ul>
    		</div>
            <div class="main-text">
        		<div class="col-xs-12 col-sm-12 col-md-7 excerpet.">
        			<h1>{{$job->title}}</h1>
                    <span class="username">by {{\DB::table('users')->find($job->user_id)->username}}</span><br/>
        			<p>{{$job->description}}</p>
                  <?php if(Auth::guest()): ?>
                      <button class="btn btn-sm btn-warning plus" type="button" onclick="window.location='{{URL::route('login')}}'"><i class="glyphicon glyphicon-plus"></i> Login first!</button>
                  <?php else: ?>
                      <?php if(isset($request_connections) && !empty($request_connections[0]) && $job->user_id != Auth::id()): ?>
                          @foreach ($request_connections as $rq)
                              <?php if($rq->job_id == $job->id){ ?>
                                  <button class="btn btn-sm btn-info plus" type="button"><i class="glyphicon glyphicon-plus"></i> Requested</button>
                              <?php }else{ ?>
                                  <button class="btn btn-sm btn-primary plus" type="button" data-toggle="modal" data-target="#contact_form-{{$job->id}}"><i class="glyphicon glyphicon-plus"></i> Connect</button>
                              <?php } ?>
                          @endforeach
                      <?php elseif($job->user_id != Auth::id()): ?>
                          <button class="btn btn-sm btn-primary plus" type="button" data-toggle="modal" data-target="#contact_form-{{$job->id}}"><i class="glyphicon glyphicon-plus"></i> Connect</button>
                      <?php endif; ?>
                  <?php endif; ?>

                  <div class="modal fade" id="contact_form-{{$job->id}}" role="dialog">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Are you sure you want to accept this job?</h4>
                              </div>
                              <div class="modal-body">
                                  {!! Form::open(array('action' => 'JobController@connect_request', 'class' => 'form')) !!}
                                  <?php
                                  $to_info = \DB::table('users')
                                              ->join('jobs', 'users.id', '=', 'jobs.user_id')
                                              ->select('users.*', 'jobs.*')
                                              ->where('users.id', '=', $job->user_id)
                                              ->get();
                                   $to_info = base64_encode(json_encode($to_info));
                                   ?>
                                   {{ Form::hidden('to_info', $to_info, array('id' => 'to_info')) }}
                                   <!-- Message text area -->
                                   <div class="features-box wow fadeInDownQuick" data-wow-delay="0.2s">
                                       <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                           <i class="icon fa fa-commenting-o"></i> <label for="message"> Message</label>
                                           <textarea id="message" name="message" class="form-control" rows="3" value="{{old('message')}}" placeholder="Hi I found your post on jobcore.ca! ..." required></textarea>
                                           @if ($errors->has('message'))
                                               <span class="help-block">
                                                   <strong>{{ $errors->first('message') }}</strong>
                                               </span>
                                           @endif
                                       </div>
                                   </div>
                                  <p>
                                      By sending this email request you accept our terms and conditions.
                                  </p><br />
                                  <div class="row">
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                          {!! Form::submit('Send', array('class'=>'btn btn-common btn-search btn-block'))!!}
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                          <button type="button" class="btn btn-common btn-search btn-block" data-dismiss="modal">Cancel</button>
                                      </div>
                                  </div>
                                  {{ Form::hidden('job_id', $job->id, array('id' => 'job_id')) }}
                  	              {!! Form::close() !!}
                                  <br />
                              </div>
                          </div>
                      </div>
                  </div>
        		</div>
            </div>
    		<span class="clearfix borda"></span>
    	</article>
        <?php $index--; ?>
    @endforeach
    <center>
        {!!$jobs->appends(Request::except('page'))->links() !!}
    </center>

  </div>
  </div>
  </div>
  </div>
</section>
@endsection
