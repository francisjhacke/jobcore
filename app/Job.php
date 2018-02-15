<?php

namespace jobcore;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'category_id', 'title', 'description', 'address',
        'pay', 'booked_date', 'booked_time','user_id'];

   /* Defining relationships */
   // Jobs to user relationships
    public function user(){
        return $this->belongsTo('jobcloud\User');
    }

    // Job to categories relationships
    public function category(){
        return $this->belongsTo('jobcloud\Category');
    }

}
