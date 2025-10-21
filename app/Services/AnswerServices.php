<?php 

namespace App\Services;

use App\Http\Requests\Answer\CreateRequest;
use App\Models\Answer;




class AnswerServices 
{

    public function list()
    {
        return Answer::all();
    }

    public function create($answers)
    {
        $userid = 1; //usado so pra teste
        $executionid = 1; //usado so pra teste

        foreach ($answers['Resposta'] as $answer) {
            Answer::create([
                'alternative_id' => $answer,
                'user_id' => $userid,
                'execution_id' => $executionid 
            ]);
        }
        
    }
}