<?php 

namespace App\Services;

use App\Models\Quiz; 


class DashboardService 
{

    public function list()
    {
        return Quiz::all(); 
    }
}