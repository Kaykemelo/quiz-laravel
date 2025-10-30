<?php 

namespace App\Services;

use App\Models\Execution;
use App\Models\Quiz;

class QuizService 
{
    public function list() 
    {
        return Quiz::all();
    }

    public function createExecution($userId, $quizId)
    {
        return Execution::create([
            'user_id' => $userId,
            'quiz_id' => $quizId
        ]);
    }
   
}