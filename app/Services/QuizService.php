<?php 

namespace App\Services;

use App\Http\Requests\Execution\CreateRequest;
use App\Models\Execution;
use App\Models\Quiz;

class QuizService 
{
    public function list($quiz_id) 
    {
        return Quiz::with('questions.alternatives')->find($quiz_id);
    }

   
   
}