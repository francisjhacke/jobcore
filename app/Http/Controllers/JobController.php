<?php
namespace jobcore\Http\Controllers;
use DB;
use jobcore\Job;
use jobcore\Job_Connection;
use Auth;
use App\Libraries\geoplugin;
use View;
use Illuminate\Support\Facades\Input;

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
        $this->middleware('auth', ['except' => 'search']);
    }

    public function search(){
        $category = Input::get('category');
        $city = Input::get('city');


        if (Auth::check()){
            $user_id = Auth::id();
            $request_connections = DB::table('job_connections')->where('user_id', $user_id)->latest()->get();
        }

        if (Input::has('category') && Input::has('city')){
            if ($category == '0' && $city == '0'){
                $jobs = DB::table('jobs')->paginate(10);
            }
            elseif ($category != '0' && $city != '0') {
                $jobs = DB::table('jobs')->where([
                    ['category_id', '=', $category],
                    ['city', '=', strtolower($city)],])->paginate(10);
            }
            elseif ($category != '0' && $city == '0') {
                $jobs = DB::table('jobs')->where('category_id', $category)->paginate(10);
            }
            elseif ($category == '0' && $city != '0'){
                $jobs = DB::table('jobs')->where('city', strtolower($city))->paginate(10);
            }
            else {
                $jobs = DB::table('jobs')->paginate(10);
            }
        }
        else {
            $jobs = DB::table('jobs')->paginate(10);
        }

        $categories = \DB::table('categories')->pluck('category_name','id');
        //$jobs->setPath('search');

        return view('/jobs/search', compact('jobs', 'categories', 'request_connections'));
    }

    public function create()
    {
      $categories = \DB::table('categories')->pluck('category_name','id');
      return view('/jobs/create')->with('categories', $categories);
    }

    public function store(Request $request){
        $userID = Auth::id();

        $location = Input::get('ff_nm_from');
        $location = explode(',', $location[0]);

        $city = $location[0];
        $prov_state = $location[1];
        $country = $location[2];

        $request->request->add(['city' => $city]);
        $request->request->add(['prov_state' => $prov_state]);
        $request->request->add(['country' => $country]);


        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'prov_state' => 'required',
            'country' => 'required',
            'city' => 'required',
            'pay' => 'required|between:0,99.99',
            'booked_date' => 'date'
        ]);

        $request = array_except($request->all(), ['ff_nm_from']);

        $inputs = array_map('strtolower', $request);

        $job = new Job($inputs);
        $job->user_id = $userID;
        $job->status = "pending";
        $job->save();

        return \Redirect::action('DashboardController@dashboard');
    }

    public function connect_request()
    {
        // Save connection
        $job_id = Input::get("job_id");
        $user_id = Auth::id();
        $valid = true;
        if (!$job_id){
            $valid = false;
        }
        if (!$user_id){
            $valid = false;
        }

        if ($valid){
            $jobconnection = new Job_Connection();
            $jobconnection->user_id = $user_id;
            $jobconnection->job_id = $job_id;
            $jobconnection->save();
        }

        // MAIL
        $sender_info = \DB::table('users')->find($user_id);
        /*$to_info = \DB::table('users')
                    ->join('jobs', 'users.id', '=', 'jobs.user_id')
                    ->select('users.*', 'jobs.*')
                    ->where('users.id', '=', 'jobs.user_id')
                    ->get();*/
        $to_info = json_decode(base64_decode(Input::get("to_info")));


        // Send email
        $to      = $to_info[0]->email;
        $subject = 'Jobcore - Request by '.$sender_info->username;
        $message = Input::get('message');
        $headers = 'From: '.$sender_info->email . "\r\n" .
            'Reply-To: '.$sender_info->email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $mail_info = array($to, $subject, $message, $headers);
        mail($to, $subject, $message, $headers);

        return \Redirect::back();
    }

    public function show()
    {
        $job = \DB::table('jobs')->find($id);
        return view('/jobs/show/{id}', compact('jobs'));
    }

    public function index(){
        $jobs = DB::table('jobs')->paginate(10);
        return view('/jobs/index', compact('jobs'));
    }
}
