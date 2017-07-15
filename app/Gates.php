<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gates extends Model
{
    public function staff()
    {
        return $this->hasMany('App\Staff');
    }
}
