<?php

namespace jobcore;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  /* Defining relationships */
  // Category to jobs relationships
   public function job(){
       return $this->hasMany('jobcloud\Job');
   }

   public function show(){
     $categories = Subject::all(['id','category_name']);
     return View::make('create_job', compact('categories',$categories));
   }

   protected $table = 'categories';
}
