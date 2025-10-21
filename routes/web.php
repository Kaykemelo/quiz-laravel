<?php

use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste-perguntas', [QuestionController::class, 'index']);

Route::get('/pergunta/{question}/edit', [QuestionController::class, 'edit']);

Route::get('/alternativa/{alternative}/edit', [AlternativeController::class, 'edit']);

Route::get('/alternativas',[AlternativeController::class, 'index']);

Route::get('/quiz',[QuestionController::class, 'index']);

Route::post('/quiz/resultado',[ResultController::class, 'store'])->name('quiz.result');

Route::get('/quiz/resultado/{executionid}',[ResultController::class, 'index'])->name('quiz.result.page');