<?php

namespace Database\Seeders;

use App\Models\Alternative;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aAlternatives = [
            [
                'question_id' => 1,
                'description' => 'Iphone Air',
                'correct' => 1
            ],
            [
                'question_id' => 1,
                'description' => 'Iphone 15',
                'correct' => 0 
            ],
            [
                'question_id' => 1,
                'description' => 'Air Pods Pro',
                'correct' => 0
            ],
            [
                'question_id' => 1,
                'description' => 'MacBook',
                'correct' => 0
            ],
            [
                'question_id' => 2,
                'description' => '2016',
                'correct' => 0
            ],
            [
                'question_id' => 2,
                'description' => '2017',
                'correct' => 0
            ],
            [
                'question_id' => 2,
                'description' => '2020',
                'correct' => 1
            ],
            [
                'question_id' => 2,
                'description' => '2021',
                'correct' => 0
            ],
            [
                'question_id' => 3,
                'description' => 'ChatGpt',
                'correct' => 0
            ],
            [
                'question_id' => 3,
                'description' => 'Siri',
                'correct' => 1
            ],
            [
                'question_id' => 3,
                'description' => 'Copilot',
                'correct' => 0
            ],
            [
                'question_id' => 3,
                'description' => 'Gemini',
                'correct' => 0
            ],
            [
                'question_id' => 4,
                'description' => 'Elon Musk',
                'correct' => 0
            ],
            [
                'question_id' => 4,
                'description' => 'Steve Jobs',
                'correct' => 1
            ],
            [
                'question_id' => 4,
                'description' => 'Mark Zukerberg',
                'correct' => 0
            ],
            [
                'question_id' => 4,
                'description' => 'Bil Gates',
                'correct' => 0
            ],
            [
                'question_id' => 5,
                'description' => 'Iphone 3',
                'correct' => 1
            ],
            [
                'question_id' => 5,
                'description' => 'Apple Watch',
                'correct' => 0
            ],
            [
                'question_id' => 5,
                'description' => 'MacBook',
                'correct' => 0
            ],
            [
                'question_id' => 5,
                'description' => 'iPad',
                'correct' => 0
            ],
            
        ];

        foreach ($aAlternatives as $alternatives) {
            Alternative::create($alternatives);
        }
    }
}
