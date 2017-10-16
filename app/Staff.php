<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function gate()
    {
        return $this->belongsTo('App\Gates','station');
    }

    public function scan()
    {
        return $this->hasMany('App\Scans');
    }

    public function blockings()
    {
        return $this->hasMany('App\Blockings');
    }

}
