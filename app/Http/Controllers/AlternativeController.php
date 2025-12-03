<?php

namespace App\Http\Controllers;

use App\Services\AlternativeService;
use App\Http\Requests\Alternative\CreateRequest;
use App\Http\Requests\Alternative\UpdateRequest;
use App\Models\Alternative;
use App\Models\Question;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{

    public function __construct(
       protected AlternativeService $service
    ){}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatives = $this->service->list();
        dd($alternatives);  

        //return view('', compact('alternatives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($question)
    {
        $aQuestion = Question::with('alternatives')->where('status', 1)->find($question);

        return view('admin.alternatives.index', ['aQuestion' => $aQuestion]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        try {
            $data = $request->validated();

            $this->service->Insert($data);

            return back()->with('success', 'Alternativa criada com sucesso.');
        } catch (\Exception $e) {
            
            return back()->with('error', 'Erro ao cadastrar.');
        }
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
    public function edit(Alternative $alternative)
    {
        dd($alternative);
        $alternative = $this->service->edit($alternative);

        //return view('', compact('alternative'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Alternative $alternative)
    {
       try {
          $data = $request->validated();

          $this->service->update($alternative , $data);

          return back()->with('success_update', 'Alternativa atualizada com sucesso.');
       } catch (\Exception $e) {
          return back()->with('error_update', 'Erro ao atualizar.'); 
       }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternative $alternative)
    {
        dd($alternative);
        $this->service->delete($alternative);

        //return back()->with('sucess', 'Alternativa excluida com sucesso!');
    }
}
