<?php

namespace App\Services;

use App\Models\Learner;
use App\Models\Enrolment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class LearnerProgressService
{
    public function applyFilters(Request $request): Collection
    {
        $query = Enrolment::query()
            ->with(['course', 'learner']);  // eager load relationships
        // Filter by course 
        if ($request->filled('course')) {
            $query->where('course_id', $request->course);
        }
        // Filter by progress range 
        if ($request->filled('progress_min')) {
            $query->where('progress', '>=', $request->progress_min);
        }

        if ($request->filled('progress_max')) {
            $query->where('progress', '<=', $request->progress_max);
        }
        // Sorting by progress 
        if ($request->filled('sort_progress')) {
            $direction = $request->sort_progress === 'desc' ? 'desc' : 'asc';
            $query->orderBy('progress', $direction);
        }
        return $query->get();
    }
}

