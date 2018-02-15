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
   return view('/welcome')->with('categories', $categories);
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/profile', 'UserController@profile');

Route::resource('jobs', 'JobController');
// Jobs
Route::get('/jobs/create', 'JobController@create');
Route::post('/jobs/store', 'JobController@store');

Route::post('/jobs', 'JobController@index');
Route::get('/jobs', 'JobController@index');

Route::post('/jobs/search', 'JobController@search');
//Route::get('/jobs/search', 'JobController@search');

Route::get('/jobs/show/{job}', function ($id){
  $job = DB::table('jobs')->find($id);
  return view('/jobs/show/', compact('jobs'));
});
