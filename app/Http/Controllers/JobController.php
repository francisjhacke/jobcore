<?php
namespace jobcore\Http\Controllers;
use DB;
use jobcore\Job;
use Auth;
use App\Libraries\geoplugin;
use View;

use Illuminate\Http\Request;

class JobController extends Controller
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


    public function create()
    {
      $categories = \DB::table('categories')->pluck('category_name','id');
      return view('/jobs/create')->with('categories', $categories);
    }

    public function store(Request $request){
        $userID = Auth::id();

        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'pay' => 'required',
            'booked_date' => 'required|date',
            'booked_time' => 'required',
        ]);

        $job = new Job($request->all());
        $job->user_id = $userID;
        $job->save();
        return \Redirect::route('/jobs', array($job->id))->with('message', 'Your job has been created!');
    }

    public function show()
    {
        return view('/jobs/show');
    }

    public function index(){
        $jobs = DB::table('jobs')->latest()->get();
        return view('/jobs/index', compact('jobs'));
    }

    public function search(Request $request){

        $category = $request->input('category');
        $city = $request->input('city');
        $jobs = DB::table('jobs')->latest()->get();

        if ($request->has('category')){
            return View::make('jobs/search', compact('jobs'));
            return View::make('jobs/search')->with('category', $category);
        }
        else {
            return View::make('jobs/search', compact('jobs'));
        }

    }
}
