<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $aQuestions = [
            [
                'description' => '1. Qual é o ultimo modelo de lançamento da apple ?',
                'status' => 1
            ],
            [
                'description' => '2. Em que ano teve o lançamento do Air Pods ?',
                'status' => 1
            ],
            [
                'description' => '3. Qual é a IA Assistente da apple ?',
                'status' => 1
            ],
            [
                'description' => '4. Quem foi o criador da apple ?',
                'status' => 1
            ],
            [
                'description' => '5. Qual é o primeiro lançamento da marca apple ?', 
                'status' => 1 
            ] 
       ]; 
       
    foreach ($aQuestions as $questions) {
        Question::create($questions); 
    } 

    }
}
