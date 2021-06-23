@extends('layouts.app')
@section('content')
    <quiz-component
       :times="{{$time}}"
       :quizId="{{$quizId}}"
       :quiz-questions="{{$quizQuestions}}"
       :has-quiz-played="{{$authUserHasPlayedQuiz}}">



    </quiz-component>
    <script type="text/javascript">
    window.oncontextmenu=function(){
        console.log("right Click Disabled");
        return false;
    }
    </script>
@endsection