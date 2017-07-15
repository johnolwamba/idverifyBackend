<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    public function students()
    {
        return $this->hasMany('App\Students');
    }
}
