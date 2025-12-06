<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct( 
        protected DashboardService $service
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dashboards = $this->service->list();

        return view('dashboard', ['dashboards' => $dashboards]);
    }

}
