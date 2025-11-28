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

    public function store($aData)
    {
      
        foreach ($aData['description'] as  $key => $description) 
        {
          Question::create([
            'description' => $description,
            'status' => $aData['status'][$key],
            'quiz_id' => $aData['quiz_id']
          ]);
        }

        return true;
    }
    
    public function edit(Question $question)
    {
      return Question::find($question->id);
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