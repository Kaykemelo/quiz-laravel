<?php

namespace App\Services;

use App\Models\Question;

class QuestionService 
{
    public function insert($aData)
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
    
    public function update(Question $question, $data)
    {
      return $question->update($data);
    }

    public function delete(Question $question)
    {
        return $question->delete();
    }

}