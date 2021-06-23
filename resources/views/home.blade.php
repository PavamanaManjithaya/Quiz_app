@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-8">
            @if (Session::has('error'))
        <div class="alert alert-danger">{{Session::get('error')}}</div>
            
        @endif
            <div class="card">
                <div class="card-header">{{ __('Exam') }}</div>
                @if ($isExamAssigned)
                @foreach ($quizes as $quiz)
                    
                
                <div class="card-body">
                  <p><h3>{{$quiz->name}}</h3></p>
                  <p>About Exam:{{$quiz->description}}</p>    
                  <p>Time Allocated:{{$quiz->minutes}}</p>
                  <p>Number Of Question:{{$quiz->questions->count()}}</p>
                  <p>
                      @if (!in_array($quiz->id,$wasQuizCompleted))
                         <a href="{{route('get.quizquestion',[$quiz->id])}}"><button class="btn btn-success">Start Quiz</button></a> 
                      @else
                      <a href="/result/user/{{auth()->user()->id}}/quiz/{{$quiz->id}}">View Result</a>
                      <span class="float-right">Commpleted</span>
                      @endif

                  </p>
                </div>
                @endforeach
                @else
                  <p>You have not assigned any exam..</p>
                @endif
            </div>
           
        </div>
        <div class="col-md-4">
            <div class="card">
                   <div class="card-header">{{ __('User Profile') }}</div>
                       <div class="card-body">
                          <p>Email:{{auth()->user()->email}}</p>
                          <p>Occupatin:{{auth()->user()->occupation}}</p>
                          <p>Address:{{auth()->user()->address}}</p>
                          <p>Phone:{{auth()->user()->phone}}</p>
                       </div>
            </div>           
        </div>
    </div>
</div>
@endsection
