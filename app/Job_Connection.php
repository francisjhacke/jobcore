<?php

namespace jobcore;

use Illuminate\Database\Eloquent\Model;

class Job_Connection extends Model
{
    protected $table = 'job_connections';
    protected $hidden = [
        'remember_token'
    ];

    protected $fillable = [
        'user_id', 'job_id', 'confirmed'
    ];

    public function users(){
      return $this->belongsTo('jobcloud\User');
    }

    public function jobs(){
      return $this->belongsTo('jobcloud\Job');
    }

}
