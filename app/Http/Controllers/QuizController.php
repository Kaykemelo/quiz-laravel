<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QuizService;
use App\Http\Requests\Quiz\CreateRequest as QuizCreateRequest;
use PhpParser\Node\Stmt\TryCatch;

class QuizController extends Controller
{
    public function __construct(
        protected QuizService $service
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index($quiz_id)
    {
        $quiz = $this->service->list($quiz_id);

        return view('quiz.create', [
            'quiz' => $quiz
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.quiz.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuizCreateRequest $request)
    {
       try {
            $data = $request->validated();

            $this->service->insert($data);

            return back()->with('success', 'Quiz cadastrado com sucesso.');
       } catch (\Exception $e) {
            return back()->with('error', 'Erro ao cadastrar.');
       }

        
    }

}
