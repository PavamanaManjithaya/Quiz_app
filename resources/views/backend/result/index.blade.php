@extends('backend.layouts.master')
@section('title','view result')
@section('content')

<div class="span9">
    <div class="content">
        @if (Session::has('messeges'))
               <div class="alert alert-info">
                 {{Session::get('messeges')}}
               </div>
           @endif
        <div class="module">
            <div class="module-head">
                <h3>User Exam</h3>
            </div>
            <div class="module-body">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>NAME</th>
                             <th>Quiz</th>
                             <th></th>
                         </tr>
                     </thead> 
                     <tbody>
                         @if (count($quizes)>0)
                         @php
                             $key=1;
                         @endphp
                         @foreach ($quizes as $quiz)
                         @foreach ($quiz->users as $user)
                            

                           <tr>
                               <td>{{$key}}</td>
                               <td>{{$user->name}}</td>
                               <td>{{$quiz->name}}</td>
                               <td>
                                <a href="{{route('quiz.question',[$quiz->id])}}"><button class="btn btn-inverse">View Question</button></a>

                               </td>
                               <td>
                                   <a href="{{route('userquiz.result',[$user->id,$quiz->id])}}">
                                       <button class="btn btn-primary">View Result</button>
                                   </a>
                               </td>
                           </tr>  
                           @php
                           $key++;
                       @endphp
                         @endforeach
                         @endforeach 
                         @else
                            <tr>No Quiz to display..</tr>  
                         @endif
                         
                     </tbody>
                 </table>
            </div>
        </div>    
    </div>
</div>


@endsection