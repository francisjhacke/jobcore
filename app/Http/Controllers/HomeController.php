<?php

namespace jobcore\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
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
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        $categories = \DB::table('categories')->pluck('category_name','id');
        return view('/')->with('categories', $categories);
    }

    public function search()
    {
        $jobs = DB::table('jobs')->latest()->get();
        return view('/jobs/index', compact('jobs'));
    }
}
