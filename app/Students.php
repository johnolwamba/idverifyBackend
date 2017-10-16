<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = "students";

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function course()
    {
        return $this->belongsTo('App\Courses');
    }

    public function scan()
    {
        return $this->hasMany('App\Scans');
    }

    public function blockings()
    {
        return $this->hasMany('App\Blockings','student_id');
    }

}
