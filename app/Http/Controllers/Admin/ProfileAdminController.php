<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileRequest;
use App\Models\Admin;
use App\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        return view('admin.pages.profile');
    }


    public function updatePassword(Request $request){
        $user = Admin::find(Auth::id());
        if (!$user){
            return Redirect()->route('admin.profile')->with('error','Updated Fail, user not found');
        }

        $password = Auth::user()->password;

        $oldPassword=$request->old_password;
        $newPass=$request->password;
        $confirm=$request->password_confirmation;

        if ($newPass && $confirm){
            if (Hash::check($oldPassword,$password)) {
                if ($newPass === $confirm) {
//                    $hashPass = $user->password=Hash::make($request->password);
                    $user->update($request->only(['password']));
                    Auth::logout();
                    $notification=array(
                        'message'=>'Update Password Successfully ,',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('Show.Form.login')->with($notification);
                }else{
                    $notification=array(
                        'message'=>'Password confirmation not true',
                        'alert-type'=>'error'
                    );
                    return Redirect()->route('admin.profile')->with($notification);
                }
            }else{
                $notification=array(
                    'message'=>'Chek Your old Password,',
                    'alert-type'=>'error'
                );
                return Redirect()->route('admin.profile')->with($notification);
            }
        }
        elseif($request->hasFile('admin_avatar')){
            $oldlogo = $request->old_avatar;
            if ($oldlogo){
                $oldlogo = public_path($oldlogo);
                unlink($oldlogo); //delete from folder
            }
            $imagePath = parent::uploadImage($request->file('admin_avatar'),'image/admin/avatar_' . Auth::id());
            $user->avatar= $imagePath;
            $user->update($request->only(['imagePath']));
            $notification=array(
                'message'=>'Update avatar Successfully ,',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.profile')->with($notification);
        }
        else{
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
            ]);
            $user->update($request->except(['avatar','password']));
              $notification=array(
                'message'=>'Update Profile Successfully ,',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.profile')->with($notification);
        }
    }

}
