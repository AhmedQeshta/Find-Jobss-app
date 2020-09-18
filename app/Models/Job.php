<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Job extends Model
{
    protected $table = 'jobs';
    protected $fillable = [
                'name', 'title','slug','description','ageGroupFrom','ageGroupTo','experience',
                'price','specialization','address','city','country','typeJob',
                'DaysOfWork','BusinessHoursFrom','BusinessHoursFromTime', 'BusinessHoursTo',
                'BusinessHoursToTime','Year','day','month','date',
    ];

    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug($this->attributes['title'] . ' ' . $this->attributes['name']);
    }
}
