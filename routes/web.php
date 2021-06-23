<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes(
    [
        'register'=>false,
        'reset'=>false,
        'verify'=>false,
    ]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    Route::get('quizplay/{quizID}', [App\Http\Controllers\ExamController::class, 'getQuizQuestions'])->name('get.quizquestion');
    Route::post('quizplay/result', 'App\Http\Controllers\ExamController@postQuiz');
    Route::get('/result/user/{userId}/quiz/{quizId}','App\Http\Controllers\ExamController@viewResult');
    

});    



Route::middleware('isAdmin')->group(function () {
    Route::resource('quiz', 'App\Http\Controllers\QuizController');
    Route::resource('question', 'App\Http\Controllers\QuestionController');
    Route::resource('user', 'App\Http\Controllers\UserController');
    Route::get('/quiz/{id}/questions', [App\Http\Controllers\QuizController::class, 'question'])->name('quiz.question');
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::get('exam/assign', [App\Http\Controllers\ExamController::class, 'create'])->name('user.exam');
    Route::post('exam/assign', [App\Http\Controllers\ExamController::class, 'assignExam'])->name('exam.assign');
    Route::get('exam/user', [App\Http\Controllers\ExamController::class, 'userExam'])->name('view.assign');
    Route::post('exam/remove', [App\Http\Controllers\ExamController::class, 'removeExam'])->name('exam.remove');
    Route::get('result', [App\Http\Controllers\ExamController::class, 'result'])->name('view.result');
    Route::get('result/{userId}/{quizId}', [App\Http\Controllers\ExamController::class, 'userquizResult'])->name('userquiz.result');



});
