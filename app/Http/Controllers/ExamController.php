<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Question;
use App\Models\Answer;
use DB;
class ExamController extends Controller
{
    public function create(){
        return view('backend.exam.create');
    }
    public function assignExam(Request $request){
        $quiz=(new Quiz)->assignExam($request->all());
        return redirect()->back()->with('messeges','Exam assigned to user successfully..');
    }
    public function userExam(){
        $quizes=Quiz::get();
        return view('backend.exam.index',compact('quizes'));
    }
    public function removeExam(Request $request){
        $userId=$request->get('user_id');
        $quizId=$request->get('quiz_id');
        $quiz=Quiz::find($quizId);
        $result=Result::where('quiz_id',$quizId)->where('user_id',$userId)->exists();
        if($result){
            return redirect()->back()->with('messeges','This quiz already played by user..cant be removed.');

        }else{
            $quiz->users()->detach($userId);
            return redirect()->back()->with('messeges','Exam removed successfully.');

        }

    }
    public function getQuizQuestions($quizId){
        $authUser=auth()->user()->id;
        //check if user has exam assigned
        $userId=DB::table('quiz_user')->where('user_id',$authUser)->pluck('quiz_id')->toArray();
        if(!in_array($quizId,$userId)){
            return redirect()->to('/home')->with('error','You are not assigned exam');
        }
        $quiz=Quiz::find($quizId);
        $time=Quiz::where('id',$quizId)->value('minutes');
        $quizQuestions=Question::where('quiz_id',$quizId)->with('answers')->get();
        $authUserHasPlayedQuiz=Result::where(['user_id'=>$authUser,'quiz_id'=>$quizId])->get();

        //has user ever played or not
        $wasCompleted=Result::where('user_id',$authUser)->whereIn('quiz_id',(new Quiz)->hasQuizAttempted())->pluck('quiz_id')->toArray();
        if(in_array($quizId,$wasCompleted)){
            return redirect()->to('/home')->with('error','You already participated in Quiz..');

        }
        return view('quiz',compact('quizId','time','quizQuestions','authUserHasPlayedQuiz'));

    }
    public function postQuiz(Request $request){
        $questionId=$request['questionId'];
        $answerId=$request['answerId'];
        $quizId=$request['quizId'];
        $authUser=auth()->user()->id;
         return $userQuestionAnswer=Result::updateOrCreate([
            'user_id'=>$authUser,'quiz_id'=>$quizId,'question_id'=>$questionId
        ],
        [
            'answer_id'=>$answerId
        ]);
    }
    public function viewResult($userId,$quizId){
        $results=Result::where('user_id',$userId)->where('quiz_id',$quizId)->get();

        return view('result-details',compact('results'));


    }
    public function result(){
        $quizes=Quiz::get();
        return view('backend.result.index',compact('quizes')); 
    }
    public function userquizResult($userId,$quizId){
        $results=Result::where('user_id',$userId)->where('quiz_id',$quizId)->get();
        $totalQuestion=Question::where('quiz_id',$quizId)->count();
        $atttemptQuestion=Result::where('user_id',$userId)->where('quiz_id',$quizId)->count();
        $quiz=Quiz::where('id',$quizId)->get();
        $ans=[];
        foreach ($results as  $answer) {
            array_push($ans,$answer->answer_id);
        }
        $userCorrectedAnswer=Answer::whereIn('id',$ans)->where('is_correct',1)->count();
        
        if($atttemptQuestion){
        $userWrongAnswer=$totalQuestion-$userCorrectedAnswer;
        $percentage=($userCorrectedAnswer/$totalQuestion)*100;
        }else{
          $userWrongAnswer=0;
          $percentage=0;   
        }
        return view('backend.result.result',compact('results','totalQuestion','atttemptQuestion','userCorrectedAnswer','userWrongAnswer','percentage','quiz'));
    }
}