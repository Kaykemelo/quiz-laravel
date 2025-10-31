<?php 

namespace App\Services;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Execution;

class ResultService 
{
    public function list($executionid)
    {

        return Question::with([
            'alternatives.answers' => function($query) use ($executionid) {
                $query->where('execution_id', $executionid);
            }
        ])->get();
         
    }

    public function createExecution($executionRequest)
    {
        return Execution::create($executionRequest);
    }


    public function create($answers)
    {
        
        foreach ($answers['Answer'] as $answer) {
          
            Answer::create([
                'user_id' => auth()->id(),
                'execution_id' => $answers['execution_id'],
                'alternative_id' => $answer
            ]);
        }

        return true;
    }

}