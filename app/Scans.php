<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scans extends Model
{

    protected $table = 'scans';

    public function students()
    {
        return $this->belongsTo('App\Students', 'student_id');
    }

    public function staff()
    {
        return $this->belongsTo('App\Staff', 'staff_id');
    }
}
