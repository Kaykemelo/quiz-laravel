<?php

namespace App\Services;

use App\Http\Requests\Question\CreateRequest;
use App\Http\Requests\Question\UpdateRequest;
use App\Models\Question;

class QuestionService 
{

    public function list()
    {
      return Question::with('alternatives')->get();
    }

    public function create($payload)
    {
      return Question::create($payload); 
    }
    
    public function edit(Question $question)
    {
      return Question::with('alternatives')->find($question->id);
    }

    public function update(Question $question, $data)
    {
       return $question->update($data);
    }

    public function delete(Question $question)
    {
        return $question->delete();
    }

}