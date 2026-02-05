<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LearnerProgressService;
use App\Models\Enrolment;
use App\Models;

class LearnerProgressController extends Controller
{
    protected $progressService;
    public function __construct(LearnerProgressService $progressService)
    {
        $this->progressService = $progressService;
    }
    public function index(Request $request) 
    { 
        $progress = $this->progressService->applyFilters($request); 
        return view('learner-progress.index', compact('progress'));
    }
}
