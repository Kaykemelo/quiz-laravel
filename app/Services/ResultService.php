<?php 

namespace App\Services;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Execution;

class ResultService 
{
    public function list($executionid)
    {
        return Execution::with([
            'quiz.questions.alternatives.answers' => function($query) use ($executionid) {
                $query->where('execution_id', $executionid);
            }
        ])->find($executionid);
    }

    public function createExecution($executionRequest)
    {
        return Execution::create($executionRequest);
    }


    public function countAnswers($executionid)
    {
        return Answer::where('execution_id',$executionid)->
               whereHas('alternative', function($query) {
                $query->where('correct', 1);
         })->count();
    }


    public function insert($answers)
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