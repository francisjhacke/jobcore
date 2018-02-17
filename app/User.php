<?php

namespace jobcore;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /* Defining relationships */
    // user to jobs relationships
    public function jobs(){
      return $this->hasMany('jobcloud\Job');
    }

    public function jobconnection(){
      return $this->hasMany('jobcloud\Job_Connection');
    }


}
