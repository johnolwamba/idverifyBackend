<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Users');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function scan()
    {
        return $this->belongsTo('App\Scans');
    }
}
