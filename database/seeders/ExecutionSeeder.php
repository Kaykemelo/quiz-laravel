<?php

namespace Database\Seeders;

use App\Models\Execution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExecutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aExecutions = [
            [
                'user_id' => 1
            ]
        ];

        foreach ($aExecutions as $execution) {
            Execution::create($execution);
        }

    }
}
