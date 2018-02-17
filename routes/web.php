<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
   $categories = \DB::table('categories')->pluck('category_name','id');
   $jobs_count = \DB::table('jobs')->count();
   $users_count = \DB::table('users')->count();
   $cities_count = \DB::table('jobs')->select('city', \DB::raw('count(*) as total'))
                                     ->groupBy('city')->pluck('total','city');
   $cities_count = count($cities_count);
   return view('/welcome')
        ->with('categories', $categories)
        ->with('job_count', $jobs_count)
        ->with('city_count', $cities_count)
        ->with('user_count', $users_count);
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/profile', 'UserController@profile');
Route::get('/dashboard', 'DashboardController@dashboard');
Route::post('/profile_update', 'UserController@profile_update');


// Search
Route::get('/jobs/search', 'JobController@search');
Route::post('/jobs/search', 'JobController@search');

Route::post('/jobs/connect_request', 'JobController@connect_request');

// Create
Route::get('/jobs/create', 'JobController@create');
Route::post('/jobs/store', 'JobController@store');


// Show all
Route::post('/jobs', 'JobController@index');
Route::get('/jobs', 'JobController@index');

Route::get('/jobs/show/{job}', function ($id){
  $job = DB::table('jobs')->find($id);
  return view('/jobs/show/', compact('jobs'));
});


/* JOBS */
Route::resource('jobs', 'JobController');
