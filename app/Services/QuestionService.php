<?php

namespace App\Services;

use App\Http\Requests\Question\CreateRequest;
use App\Http\Requests\Question\UpdateRequest;
use App\Models\Question;

class QuestionService 
{

    public function list()
    {
      return Question::all();
    }

    public function create($payload)
    {
      
      dd($payload);

      
      
      return Question::create(); 
    }
                                                    
    public function update(UpdateRequest $request , Question $question)
    {
       $data = $request->validated();

       return $question->update($data);


    }

    public function delete(Question $question)
    {
        return $question->delete();
    }

}