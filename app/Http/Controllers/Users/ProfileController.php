<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
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

}