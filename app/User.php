<?php

namespace App;

use App\Models\UserAnswer;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','phone','avatar','address', 'age', 'job', 'status_question','provider_id','provider'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function answerQuizUser(){
        return  $this->hasMany(UserAnswer::class ,'user_id','id');
    }

    public function getStatusQuestion(){
        if($this ->status_question == 0){
            return  'He did not test';
        }elseif ($this -> status_question == 1){
            return  'Under review';
        }else{
            return  'Accepted';
        }
    }
}
