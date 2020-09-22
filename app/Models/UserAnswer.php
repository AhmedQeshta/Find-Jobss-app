<?php

namespace App\Models;

use App\Models\Quiz;
use App\User;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{

    protected $table = 'user_answers';
    protected $fillable = [
        'quiz_id','user_id','answer','status_answer','percentage',
    ];

    public function user(){
        return $this->belongsTo(User::class ,'user_id','id');
    }
    public function questionQuiz(){
        return $this->belongsTo(Quiz::class ,'quiz_id','id');
    }


}
