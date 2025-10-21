<?php 

namespace App\Services;

use App\Models\Answer;
use App\Models\Question;

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

    public function create($answers)
    {
        $userid = 1;
        $executionid = 1;

        foreach ($answers['Resposta'] as $answer) {
            Answer::create([
                'user_id' => $userid,
                'execution_id' => $executionid,
                'alternative_id' => $answer
            ]);
        }

        return true;
    }
}