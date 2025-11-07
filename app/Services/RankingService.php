<?php 

namespace App\Services;

use App\Models\User;

class RankingService 
{
    public function getDataRanking() 
    {
        return User::selectRaw('users.name as Nome , executions.created_at as Data_Execucao, COUNT(answers.alternative_id) as Pontuacao')
            ->join('executions', 'users.id' , '=' , 'executions.user_id')
            ->join('answers' , 'answers.execution_id' , '=' , 'executions.id')
            ->join('alternatives' , 'alternatives.id' , '=' , 'answers.alternative_id') 
            ->where('alternatives.correct', 1)
            ->groupBy('users.name', 'executions.created_at')
            ->orderByDesc('Pontuacao')
            ->get(); 
    }
}