<?php 

namespace App\Services;

use App\Models\Quiz;

class QuizService 
{
    public function list($quiz_id) 
    {
        return Quiz::with('questions.alternatives')->find($quiz_id);
    }

    public function insert($data)
    {
        return Quiz::create($data);
    }
   
}