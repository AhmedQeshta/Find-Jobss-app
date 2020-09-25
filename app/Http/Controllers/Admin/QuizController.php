<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Quiz;
use App\Models\UserAnswer;
use App\Notifications\CreatedCVNotification;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
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
        $answerQuestionForUsers = $Quiz->answerQuizForUser;
        if (!$Quiz){
            $notification=array(
                'message'=>'Question not Found',
                'alert-type'=>'error'
            );
            return redirect()->route('admin.quiz')->with($notification);
        }
        $Quiz->delete();
        foreach ($answerQuestionForUsers as $answerQuestionForUser){
            $answerQuestionForUser->delete();//delete answer this question
        }

        $notification=array(
            'message'=>'Question deleted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.quiz')->with($notification);
    }



    public function indexAnswerQuiz()
    {
        $users = User::get();
        return view('admin.pages.quizzes.answerUser',compact('users'));
    }

    public function showAnswerUser($id){
       $user = User::find($id);
       $answer_user = $user->answerQuizUser;
       $questions = Quiz::get();
        if (!$user){
            return redirect()->route('admin.quiz.users.answers')->with('error','user not found');
        }
        return view('admin.pages.quizzes.showanswerUser',compact('user','answer_user','questions'));
    }

    public function updateStatusAnswer($id){
        $answerUser = UserAnswer::find($id);
        if (!$answerUser){
            return redirect()->route('user.profile')->with('error','Answer not found');
        }
        $answerUser->update(['status_answer'=>1]);
          $notification=array(
                'message'=>'Add successfully',
                'alert-type'=>'success'
            );

        return redirect()->route('admin.quiz.showAnswerUser',$answerUser->user_id)->with($notification);
    }
    public function updateStatusUser($id){

         $user = User::find($id);
        if (!$user){
            return redirect()->route('admin.quiz.users.answers')->with('error','user not found');
        }
        $user->update(['status_question'=>2]);
          $notification=array(
                'message'=>'Add successfully',
                'alert-type'=>'success'
            );
//          add notification mail
        Notification::send($user, new CreatedCVNotification($user));

        return redirect()->route('admin.quiz.users.answers')->with($notification);
    }

    public function updatePercentage(Request $request , $id){

        $answerUser = UserAnswer::find($id);
        if (!$answerUser){
            return redirect()->route('admin.quiz.showAnswerUser',$answerUser->user_id)->with('error','Answer not found');
        }
        $request['percentage'] = $request->percentage;
        $answerUser->update($request->all());
        $notification=array(
            'message'=>'Add successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('admin.quiz.showAnswerUser',$answerUser->user_id)->with($notification);
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
