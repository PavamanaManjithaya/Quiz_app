<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;
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
}