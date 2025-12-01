<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\ResultController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('/quiz')->group( function () {
    Route::get('/{quizId}',[QuizController::class, 'index'])->name('quiz');
    Route::post('/resultado',[ResultController::class, 'store'])->name('quiz.result');
    Route::get('/resultado/{executionid}',[ResultController::class, 'index'])->name('quiz.result.page');
});


Route::get('/ranking' , [RankingController::class, 'index'])->name('ranking');
Route::get('/admin/quiz/create', [QuizController::class, 'create']);
Route::post('/admin/quiz/store', [QuizController::class, 'store'])->name('quiz.store');


Route::prefix('admin/questions')->group( function () {
   Route::get('/create', [QuestionController::class,'create']);
   Route::post('/store', [QuestionController::class, 'store'])->name('question.store'); 
   Route::put('/update/{question}' , [QuestionController::class, 'update'])->name('question.update');
   Route::delete('/delete/{question}', [QuestionController::class, 'destroy'])->name('question.destroy');
});
