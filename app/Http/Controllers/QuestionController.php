<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\CreateRequest;
use App\Http\Requests\Question\UpdateRequest;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Services\QuestionService;
use Illuminate\Auth\Events\Validated;

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
       $Questions = $this->service->list();
        dd($Questions);
       //return view('', compact('Questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $payload = $request->Validated();

        dd($payload);
        $this->service->create($payload);

        //return back()->with('success', 'Pergunta criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //dd($question);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        
        $question = $this->service->edit($question);
        
        dd($question);
        //return view('', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Question $question)
    {
        $data = $request->validated();
        dd($data);
        $this->service->update($question , $data);

        //return back()->with('success', 'Pergunta alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        dd($question);
        $this->service->delete($question);

        //return back()->with('sucess', 'Pergunta excluida com sucesso!');
    }
}
