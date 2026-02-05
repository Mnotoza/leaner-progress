<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{
   public function learner() 
   {
      return $this->belongsTo(Learner::class); 
   }

   public function course() 
   { 
      return $this->belongsTo(Course::class); 
   }
}
