<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeAdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $jobs = Job::get();
        $Quiz = Quiz::get();
        return view('admin.pages.mainBar',compact('jobs','Quiz'));
    }

    public function logout()
    {
        Auth::logout();
        $notification=array(
            'message'=>'Successfully Logout',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.login')->with($notification);
    }
}
