<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scans extends Model
{
    public function students()
    {
        return $this->hasMany('App\Students');
    }

    public function staff()
    {
        return $this->hasMany('App\Staff');
    }
}
