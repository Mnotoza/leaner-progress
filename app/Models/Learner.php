<?php

namespace App\Models;

use App\Models\Enrolment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learner extends Model
{
  use HasFactory;

  public function enrolments()
  {
    return $this->hasMany(Enrolment::class);
  }

  public function enrolmentsForCourse($courseId)
  {
    return $this->hasMany(Enrolment::class)
      ->where('course_id', $courseId)
      ->with('course');
  }

  // Accessor for full name
  public function getNameAttribute()
  {
    return "{$this->firstname} {$this->lastname}";
  }
}
