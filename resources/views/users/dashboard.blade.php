@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#profile" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-user"></h4><br/>Profile
                </a>
                <a href="#jobs" class="list-group-item active text-center">
                  <h4 class="glyphicon glyphicon-briefcase"></h4><br/>My Jobs
                </a>
                <a href="#connections" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-road"></h4><br/>Connections
                </a>
                <a href="#notifications" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-bell"></h4><br/>Notifications
                </a>
                <a href="#history" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-book"></h4><br/>History
                </a>
              </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
                <!-- Profile section -->
                <div id="profile" class="bhoechie-tab-content">
					@include('users.profile')
                </div>
                <!-- Jobs section -->
                <div id="jobs" class="bhoechie-tab-content active">
                    <?php if($myJobPosts->count()): ?>
                        @include('users.myJobPosts')
                    <?php else: ?>
                        <p>
                            You haven't posted any jobs!
                        </p>
                    <?php endif;?>
                </div>

                <!-- Connections section -->
                <div id="connections" class="bhoechie-tab-content">
					<p>
						Coming soon!
					</p>
                </div>
				<!-- Notifications Section -->
                <div id="notifications" class="bhoechie-tab-content">
                    <p>
						Coming soon!
					</p>
                </div>
				<!-- History Section -->
                <div id="history" class="bhoechie-tab-content">
                    <p>
						Coming soon!
					</p>
                </div>
            </div>
        </div>
  </div>
</div>

@endsection
