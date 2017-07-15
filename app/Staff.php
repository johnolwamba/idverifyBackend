<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Users');
    }

    public function gate()
    {
        return $this->belongsTo('App\Gates');
    }

    public function scan()
    {
        return $this->belongsTo('App\Scans');
    }

}
