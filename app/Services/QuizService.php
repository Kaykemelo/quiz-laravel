<?php 

namespace App\Services;

use App\Models\Quiz;

class QuizService 
{
    public function list() 
    {
        return Quiz::with('questions')->get();
    }

   
}