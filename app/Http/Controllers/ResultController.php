<?php

namespace App\Http\Controllers;

use App\Http\Requests\Answer\CreateRequest;
use App\Services\ResultService;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    protected $service;

    public function __construct(ResultService $service)
    {
        $this->service = $service;
    }

    public function index($executionid)
    {
        
        $Questions = $this->service->list($executionid);

        return view('quiz/result', compact('Questions'));
    }

    public function store(CreateRequest $request)
    {
        $answers = $request->validated();
        
        $this->service->create($answers);


        return redirect()->route('quiz.result.page', ['executionid' => 1]);
    }
}
