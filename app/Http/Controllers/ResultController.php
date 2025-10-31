<?php

namespace App\Http\Controllers;

use App\Http\Requests\Answer\CreateRequest as AnswerCreateRequest;
use App\Services\ResultService;
use Illuminate\Http\Request;
use App\Http\Requests\Execution\CreateRequest as ExecutionCreateRequest;

class ResultController extends Controller
{

    public function __construct(
       protected ResultService $service
    ){}

    public function index($executionid)
    {
        
        $Questions = $this->service->list($executionid);
        dd($Questions);
        return view('quiz/result', compact('Questions'));
    }

    public function store(AnswerCreateRequest $request , ExecutionCreateRequest $executionRequest)
    {
       
        $request->merge(['quiz_id' => $request['quiz_id']]);

        $answers = $request->validated();
     
        $answers['execution_id'] = $this->service->createExecution($executionRequest->all())->id;
        
        $this->service->create($answers);


        return redirect()->route('quiz.result.page', $answers['execution_id']);
    }
}
