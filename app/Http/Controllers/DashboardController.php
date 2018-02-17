<?php

namespace jobcore\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use jobcore\Jobs;

class DashboardController extends Controller
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
    public function dashboard()
    {
        $user_id = Auth::id();
        $user = DB::table('users')->find($user_id);
        $myJobPosts = DB::table('jobs')->where('user_id', $user_id)->latest()->get();
        /*$job_connections = DB::table('job_connections')
                           ->join('jobs', 'job_connections.job_id', '=', 'jobs.id')
                           ->join('users', 'jobs.user_id','=','users.id')
                           ->select('job_connections.*', 'jobs.*', 'users.username')
                           ->where('users.id', '=', $user_id)
                           ->get();*/
        /*$pending_connections = DB::table('jobs')
                                ->join('job_connections', 'jobs.id', '=', 'job_connections.job_id')
                                ->join('users', 'job_connections.user_id', '=', 'users.id')
                                ->select('jobs.*')
                                ->where('users.id', '=', $user_id)
                                ->get();*/


        return view('users/dashboard', compact('myJobPosts','user'));
    }

}
