<?php

namespace App\Http\Controllers;

use App\Http\Requests\Answer\CreateRequest;
use App\Services\ResultService;
use Illuminate\Http\Request;

class ResultController extends Controller
{

    public function __construct(
       protected ResultService $service
    ){}

    public function index($executionid)
    {
        
        $Questions = $this->service->list($executionid);
        
        return view('quiz/result', compact('Questions'));
    }

    public function store(CreateRequest $request)
    {
        $answers = $request->validated();
        dd($answers);
        $this->service->create($answers);


        return redirect()->route('quiz.result.page', ['executionid' => 1]);
    }
}
