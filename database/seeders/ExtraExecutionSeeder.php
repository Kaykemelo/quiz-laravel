<?php

namespace Database\Seeders;

use App\Models\Execution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExtraExecutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        Execution::query()->update(['quiz_id' => 1]);
            
    }
}
