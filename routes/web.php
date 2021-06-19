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
Route::get('/quiz/{quizID}', [App\Http\Controllers\ExamController::class, 'getQuizQuestions'])->middleware('auth');


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


});
