<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Services\LearnerProgressService; 

class LearnerProgressController extends Controller 
{ 
    protected $service; 
    
    public function __construct(LearnerProgressService $service) 
    { 
        $this->service = $service; 
    } 
    
    public function index(Request $request) 
    { 
        $course = $request->input('course'); 
        $sort = $request->input('sort'); 

        $learners = $this->service->getLearnerProgress($course, $sort); 

        return view('learner-progress.index', compact('learners')); 
    }
}