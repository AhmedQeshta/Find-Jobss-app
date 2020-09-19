<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{

    protected $table = 'user_answers';
    protected $fillable = [
        'quiz_id','user_id','answer','status_answer','percentage',
    ];
}
