<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aQuiz = [

            [
                'description' => 'Quiz Apple',
                'status' => 1
            ]

        ];

        foreach ($aQuiz as $quiz) {
            Quiz::create($quiz);
        }
    }
}
