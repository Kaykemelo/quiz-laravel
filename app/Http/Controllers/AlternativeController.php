<?php

namespace App\Http\Controllers;

use App\Services\AlternativeService;
use App\Http\Requests\Alternative\CreateRequest;
use App\Http\Requests\Alternative\UpdateRequest;
use App\Models\Alternative;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    protected $service;

    public function __construct(AlternativeService $service)
    {
        $this->service = $service;
    }


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
    public function create()
    {
        //return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        dd($data);

        $this->service->create($data);

        //return back()->with('succes', 'Alternativa criada com sucesso!');
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
        $data = $request->validated();
        dd($data);
        $this->service->update($alternative , $data);

        //return back()->with('sucesss', 'Alternativa alterada com sucesso!');

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
