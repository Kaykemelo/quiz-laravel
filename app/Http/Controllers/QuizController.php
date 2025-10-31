<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QuizService;
use App\Http\Requests\Execution\CreateRequest;

class QuizController extends Controller
{
    public function __construct(
        protected QuizService $service
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index(CreateRequest $request, $quiz_id)
    {
        $request->merge(['quiz_id' => $quiz_id]);
        
        $execution_id = $this->service->createExecution($request->all())->id;

        $quiz = $this->service->list($quiz_id);

        return view('quiz.create', [
            'quiz' => $quiz,
            'execution_id' => $execution_id 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
