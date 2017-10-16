<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blockings extends Model
{
    protected $table = 'blockings';

    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

    public function student()
    {
        return $this->belongsTo('App\Students','student_id');
    }



}
