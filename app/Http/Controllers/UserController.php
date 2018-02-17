<?php

namespace jobcore\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use jobcore\User;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('users/profile');
    }

    public function profile_update()
    {
        $user = User::find(Auth::id());

        if (Input::has('email')){
            $user->email = Input::get('email');
        }
        if (Input::has('username')){
            $user->username = Input::get('username');
        }
        if (Input::has('email')){
            $user->name = Input::get('name');
        }

        $user->save();

        return \Redirect::action('DashboardController@dashboard');
    }

}
