<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Quiz;
use Carbon\Carbon;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class QuizController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $Quizzes = Quiz::get();
        return view('admin.pages.quizzes.index',compact('Quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());
        try {
            $request['slug'] =  $request->questionTitle;
            Quiz::create($request->all());
            $notification=array(
                'message'=>'Create Question Successfully ,',
                'alert-type'=>'success'
            );
            return redirect()->route('admin.quiz')->with($notification);
        }catch (Exception $ex){
            $notification=array(
                'message'=>'Sorry, Create Question Fail',
                'alert-type'=>'error'
            );
            return redirect()->route('admin.quiz')->with($notification);
        }
    }


    public function show($id)
    {
        $Quiz = Quiz::find($id);
        if (!$Quiz){
            $notification=array(
                'message'=>'Question not Found',
                'alert-type'=>'error'
            );
            return redirect()->route('admin.quiz')->with($notification);
        }

        $requiredExpertise =$Quiz->requiredExpertise;
        $QuizRequiredExpertise = explode(',', $requiredExpertise);

        $type_question =$Quiz->type_question;
        $QuizTypeQuestion = explode(',', $type_question);

        return view('admin.pages.quizzes.show',compact('Quiz','QuizRequiredExpertise','QuizTypeQuestion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Quiz = Quiz::find($id);
        if (!$Quiz){
            $notification=array(
                'message'=>'Question not Found',
                'alert-type'=>'error'
            );
            return redirect()->route('admin.quiz')->with($notification);
        }
        return view('admin.pages.quizzes.edit',compact('Quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->rules($id));
        $Quiz = Quiz::find($id);
        if (!$Quiz){
            $notification=array(
                'message'=>'Question not Found',
                'alert-type'=>'error'
            );
            return redirect()->route('admin.quiz')->with($notification);
        }
        $request['slug'] =  $request->questionTitle;
        $Quiz->update($request->all());
        $notification=array(
            'message'=>'Update Question Successfully ',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.quiz')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Quiz = Quiz::find($id);
        if (!$Quiz){
            $notification=array(
                'message'=>'Question not Found',
                'alert-type'=>'error'
            );
            return redirect()->route('admin.quiz')->with($notification);
        }
        $Quiz->delete();
        $notification=array(
            'message'=>'Question deleted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.quiz')->with($notification);
    }

    protected function rules($id = null){
        $rules = [];
        if($id){
            $rules['questionTitle'] = 'required|min:3|max:50|unique:quizzes,questionTitle,'. $id;
        }else {
            $rules['questionTitle'] = 'required|min:3|max:50|unique:quizzes,questionTitle';
        }
        $rules['questionDescription' ] = 'required';
        $rules['answerQuestionDescription' ] = 'required';
        $rules['requiredExpertise' ] = 'required';
        $rules['type_question' ] = 'required';
        return $rules;
    }
}