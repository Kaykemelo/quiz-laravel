<?php 

namespace App\Services;

use App\Models\Alternative;

class AlternativeService 
{
    public function Insert($data)
    {
       foreach ($data['description'] as $key => $description) 
        { 
            Alternative::create([
                'question_id' => $data['question_id'],
                'description' => $description,
                'correct' => $data['correct'][$key]
            ]);
       }
       return true;
    }

    public function update(Alternative $alternative , $data)
    {
        return $alternative->update($data);
    }

    public function delete(Alternative $alternative)
    {
        return $alternative->delete();
    }
}