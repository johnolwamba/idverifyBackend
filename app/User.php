<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function student()
    {
        return $this->hasOne('App\Students');
    }

    public function staff()
    {
        return $this->hasOne('App\Staff');
    }

    public function blockings(){
        return $this->hasManyThrough('App\Blockings','App\Students','user_id','student_id');
    }


}
