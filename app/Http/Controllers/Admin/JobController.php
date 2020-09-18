<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminJobsRequest;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class JobController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $jobs = Job::get();
        return view('admin.pages.jobs.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;
        $request->validate($this->rules());
        try {
            $request['Year'] =   Carbon::now()->isoFormat('Y');
            $request['day'] = Carbon::now()->isoFormat('dddd');
            $request['month'] = Carbon::now()->isoFormat('MMMM');
            $request['date'] =  Carbon::now()->isoFormat('D-M-Y');
            $request['slug'] =  $request->title;
            $request['status'] =  0;
            Job::create($request->all());
            $notification=array(
            'message'=>'Create JOb Successfully ,',
            'alert-type'=>'success'
            );
            return redirect()->route('admin.jobs')->with($notification);
        }catch (Exception $ex){
            $notification=array(
                'message'=>'Create JOb Fail ,',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $job = Job::find($id);
        if (!$job){
            $notification=array(
                'message'=>'Job not Found',
                'alert-type'=>'error'
            );
            return redirect()->route('admin.jobs')->with($notification);
        }
        $experience = $job->experience;
        $job_experience = explode(',', $experience);
        $specialization = $job->specialization;
        $job_specialization = explode(',', $specialization);
        $DaysOfWork = $job->DaysOfWork;
        $job_DaysOfWork = explode(',', $DaysOfWork);


        $BusinessHoursTo = $job->BusinessHoursTo;
        $BusinessHoursFrom = $job->BusinessHoursFrom;
        if ($job->BusinessHoursFromTime == $job->BusinessHoursToTime){
            $hoursAM = $BusinessHoursTo - $BusinessHoursFrom ;
        }else{
            $hoursAM = -1 ;
        }
        return view('admin.pages.jobs.show',compact('job','job_experience','job_specialization','job_DaysOfWork','hoursAM'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        if (!$job){
            $notification=array(
                'message'=>'Job not Found',
                'alert-type'=>'error'
            );
            return redirect()->route('admin.jobs')->with($notification);
        }
        return view('admin.pages.jobs.edit',compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->rules($id));

        $job = Job::find($id);
        if (!$job){
            $notification=array(
                'message'=>'Job not Found',
                'alert-type'=>'error'
            );
            return redirect()->route('admin.jobs')->with($notification);
        }

        $request['Year'] =   Carbon::now()->isoFormat('Y');
        $request['day'] = Carbon::now()->isoFormat('dddd');
        $request['month'] = Carbon::now()->isoFormat('MMMM');
        $request['date'] =  Carbon::now()->isoFormat('D-M-Y');
        $request['slug'] =  $request->title;
        if (!$request->has('status')){
            $request['status'] =  0;
        }else{
            $request['status'] =  $request->status;
        }
        $job->update($request->all());
        $notification=array(
            'message'=>'Update JOb Successfully ,',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.jobs')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $job = Job::find($id);
            if (!$job){
                $notification=array(
                    'message'=>'JOb deleted Failed',
                    'alert-type'=>'error'
                );
            return redirect()->route('admin.jobs')->with($notification);
            }
            $job->delete();
            $notification=array(
                'message'=>'JOb deleted successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('admin.jobs')->with($notification);

    }

    protected function rules($id = null){
        $rules = [];

        if($id){
            $rules['title'] = 'required|min:3|max:50|unique:jobs,title,'. $id;
        }else {
            $rules['title'] = 'required|min:3|max:50|unique:jobs,title';
        }

        $rules['name'] = 'required' ;
        $rules['description' ] = 'required';
        $rules['ageGroupFrom' ] = 'required';
        $rules['ageGroupTo' ] = 'required';
        $rules['experience' ] = 'required';
        $rules['price' ] = 'required';
        $rules['specialization' ] = 'required';
        $rules['address' ] = 'required';
        $rules['city' ] = 'required';
        $rules['country' ] = 'required';
        $rules['typeJob' ] = 'required';
        $rules['DaysOfWork' ] = 'required';
        $rules['BusinessHoursFrom' ] = 'required';
        $rules['BusinessHoursFromTime' ] = 'required';
        $rules['BusinessHoursTo' ] = 'required';
        $rules['BusinessHoursToTime' ] = 'required';

        return $rules;


    }
}
