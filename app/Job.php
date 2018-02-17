<?php

namespace jobcore;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'category_id', 'title', 'description', 'address',
        'pay', 'booked_date', 'booked_time','user_id', 'prov_state', 'country', 'city'];

    protected $hidden = [
        'remember_token'
    ];

   /* Defining relationships */
   // Jobs to user relationships
    public function user(){
        return $this->belongsTo('jobcloud\User');
    }

    // Job to categories relationships
    public function category(){
        return $this->belongsTo('jobcloud\Category');
    }

    public function jobconnection(){
        return $this->hasMany('jobcloud\Job_Connection');
    }

}
