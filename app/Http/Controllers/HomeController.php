<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('HomePage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = Job::select('title','name','id',
                                    'slug','status','experience',
                                    'price')->where('status', 1)->paginate(5);

//        foreach ($jobs as $job){
//            $job = Job::find($job->id);
//            $experience = $job->experience;
//            $job_experience = explode(',', $experience);
//        }
        $user = User::find(Auth::id());
        return view('home',compact('jobs','user'));
    }
    public function HomePage()
    {
        return view('welcome');
    }
}
