<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aUsers = [
            [
                'name' => 'Teste',
                'email' => 'testeuser@gmail.com',
                'password' => Hash::make('Teste1020')
            ]
        ];

        foreach ($aUsers as $user) {
            User::create($user); 
        }
    }
}
