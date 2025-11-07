<?php

namespace App\Http\Controllers;

use App\Services\RankingService;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function __construct(
        protected RankingService $service
    ){}

    public function index()
    {
        $rankings = $this->service->getDataRanking();
        
        return view('ranking/index', ['rankings' => $rankings]);
    }
}
