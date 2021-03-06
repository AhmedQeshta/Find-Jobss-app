<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\UserAnswer;

class Quiz extends Model
{
    protected $table = 'quizzes' ;
    protected $fillable = [
        'questionTitle', 'slug', 'questionDescription',
        'answerQuestionDescription', 'requiredExpertise' ,
        'type_question'
    ];
    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug($this->attributes['questionTitle']);
    }

    public function answerQuizForUser(){
        return  $this->hasMany(UserAnswer::class ,'quiz_id','id');
    }
}
