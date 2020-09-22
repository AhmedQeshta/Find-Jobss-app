<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\UserAnswer;
use App\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('site.user.profile');
    }

    public function updateProfile(Request $request){
        $newPassword =$request->password;
        $confirmPassword =$request->password_confirmation;
        if ($newPassword && $confirmPassword){
            if ($newPassword === $confirmPassword) {
                $user=User::find(Auth::id());
                $user->password=Hash::make($request->password);
                $user->save();
            }else{
//                $notification=array(
//                    'message'=>'New password and Confirm Password not matched!',
//                    'alert-type'=>'error'
//                );
                return Redirect()->route('user.profile')->with('error','Updated Fail');
            }
        }
        $user=User::find(Auth::id());
        if($request->hasFile('avatar')){
            $oldlogo = $request->old_avatar;
            if ($oldlogo){
                $oldlogo = public_path($oldlogo);
                unlink($oldlogo); //delete from folder
            }
            // update img
                $imagePath = parent::uploadImage($request->file('avatar'),'image/user/avatar_' . Auth::id());
                $user->avatar= $imagePath;

        }

        $user->phone=$request->phone;
        $user->name=$request->name;
        $user->age=$request->age;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->job=$request->job;
        $user->save();
//        $notification=array(
//            'message'=>'Updated Successfully ! Now can Login with Your New Password',
//            'alert-type'=>'success'
//        );
        return Redirect()->route('user.profile')->with('success','Updated Successfully');
    }

    public function updatePassword(Request $request){
        $password = Auth::user()->password;
        $user=User::find(Auth::id());

        $oldPassword=$request->old_password;
        $newPass=$request->password;
        $confirm=$request->password_confirmation;
        if ($newPass && $confirm){
            if (Hash::check($oldPassword,$password)) {
                if ($newPass === $confirm) {

                    $user->password=Hash::make($request->password);
                    $user->save();
                    Auth::logout();
//                    $notification=array(
//                        'message'=>'Password Changed Successfully ! Now Login with Your New Password',
//                        'alert-type'=>'success'
//                    );
                    return Redirect()->route('login')->with('success','Updated Successfully');
                }else{
//                    $notification=array(
//                        'message'=>'New password and Confirm Password not matched!',
//                        'alert-type'=>'error'
//                    );
                    return Redirect()->route('user.profile')->with('error','Updated Fail');
                }
            }else{
//                $notification=array(
//                    'message'=>'Old Password not matched!',
//                    'alert-type'=>'error'
//                );
                return Redirect()->route('user.profile')->with('error','Updated Fail');
            }
        }
//        $user=User::find(Auth::id());
        if($request->hasFile('avatar')){
            $oldlogo = $request->old_avatar;
            if ($oldlogo){
                $oldlogo = public_path($oldlogo);
                unlink($oldlogo); //delete from folder
            }
            $imagePath = parent::uploadImage($request->file('avatar'),'image/user/avatar_' . Auth::id());
            $user->avatar= $imagePath;
        }

        $user->phone=$request->phone;
        $user->name=$request->name;
        $user->age=$request->age;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->job=$request->job;
        $user->save();
//        $notification=array(
//            'message'=>'Updated Successfully ! Now can Login with Your New Password',
//            'alert-type'=>'success'
//        );
        return Redirect()->route('user.profile')->with('success','Updated Successfully');
    }

    public function indexQuiz(){
        $questions_count = Quiz::all();
        $questions = Quiz::select('id','questionTitle' ,
                'slug', 'questionDescription',
                'requiredExpertise', 'type_question')->paginate(1);
        foreach ($questions as $index=>$question){
            $question_arr[$index]=$question->id;
        }

        $userAnswers_Q = UserAnswer::where('user_id',Auth::id())->get();


         $countQ = $questions_count->count();
         $countA = $userAnswers_Q->count();
         if ($countA == $countQ){
             $userAnswers = 1;
         }else{
             $userAnswers = 0;
         }

        return view('site.user.quiz.index',compact('questions','userAnswers','question_arr','userAnswers_Q'));
    }

    public function AnswerStore(Request $request){


        $request['status_answer'] =  0;
        $request['percentage'] =  0;
        UserAnswer::create($request->all());
        return redirect()->back()->with('success','Add Answer success');

    }
    public function updateStatusQuestion(){
        $user = User::find(Auth::id());
        if (!$user){
            return redirect()->route('user.profile')->with('error','user not found');
        }
        $user->update(['status_question' =>1 ]);
        return redirect()->route('user.profile')->with('success','save Answer successfully');
    }

    public function ShowAnswers(){
        $user = User::find(Auth::id());
        $answer_user = $user->answerQuizUser;
        $questions = Quiz::get();
        if (!$user){
            return redirect()->route('user.profile')->with('error','user not found');
        }
        return view('site.user.quiz.showAnswers',compact('answer_user','questions'));
    }


    public function EditAnswerQuestion(){
        $user = User::find(Auth::id());
        $answer_user = $user->answerQuizUser;
        $questions = Quiz::paginate(1);
        if (!$user){
            return redirect()->route('user.profile')->with('error','user not found');
        }
        return view('site.user.quiz.edit',compact('answer_user','questions'));
    }


}
