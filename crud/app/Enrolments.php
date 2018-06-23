<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrolments extends Model
{
    public function courses()
    {
        return $this->belongsToMany('App\Course', 'app\Student');
    }
}
