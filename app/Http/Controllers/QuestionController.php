<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Services\QuestionService;

class QuestionController extends Controller
{

    protected $service;

    public function __construct(QuestionService $service)
    {
        $this->service = $service;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd($this->service->list());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd('teste');

        //$data = $request->validated();

        $payload = [
            'description' => '10 Kayke vacilão?',
            'status' => 1
        ];

        dd($payload);

        dd($this->service->create($payload));
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
    public function show(Question $question)
    {
        dd($question);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        dd($question);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        dd($question->update($request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //dd($this->service->delete());
    }
}
