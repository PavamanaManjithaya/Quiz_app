@extends('layouts.app')
@section('content')


<quiz-component
    :times="{{$time}}"
    :quizId="{{$quiz->id}}"
    :quiz-questions="{{$quizQuestions}}"
    :has-quiz-played="{{$authUserHasPlayedQuiz}}">
</quiz-component>
    
@endsection