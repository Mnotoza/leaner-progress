<?php

namespace App\Services;

use App\Models\Learner;

class LearnerProgressService
{
    public function getLearnerProgress(?string $course, ?string $sort)
    {
        $query = Learner::with(['enrolments' => function ($q) use ($course) {
            if ($course) {
                $q->where('course_id', $course)->with('course'); } else {
                $q->with('course'); } }]);
        if ($sort === 'progress') {
            $query->withSum('enrolments', 'progress')->orderBy('enrolments_sum_progress', 'desc');
        }
        return $query->get();
    }
}

