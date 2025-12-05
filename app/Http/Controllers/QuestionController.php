<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\CreateRequest;
use App\Models\Question;
use App\Services\QuestionService;
use Illuminate\Auth\Events\Validated;
use App\Http\Requests\Question\UpdateRequest;

use App\Models\Quiz;

class QuestionController extends Controller
{


    public function __construct( 
        protected QuestionService $service, 
    ){}
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $aQuiz = Quiz::with('questions')->where('status', 1)->get();

        return view('admin.questions.index', ['aQuiz' => $aQuiz]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        try {
           
            $aData = $request->validated();

            $this->service->insert($aData);
            
            return back()->with('success', 'Perguntas criadas com sucesso.');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao cadastrar.');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Question $question)
    {
         try {
            $data = $request->validated();

            $this->service->update($question , $data);

            return back()->with('success_update', 'Pergunta atualizada com sucesso.');
         } catch (\Exception $e) {
            return back()->with('error_update', 'Erro ao atualizar.');
         }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
       try {
          $this->service->delete($question);
          
          return back()->with('success_delete' , 'Pergunta excluida com sucesso.');
       } catch (\Exception $e ) {
            return back()->with('error_delete', 'Erro ao excluir.');
       }
    }
}
