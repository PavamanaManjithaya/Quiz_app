@extends('backend.layouts.master')
@section('title','assigned user')
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
                                   <form action="{{route('exam.remove')}}" method="post">@csrf
                                    
                                      <input type="hidden" name="user_id" value="{{$user->id}} ">
                                      <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                                        <button class="btn btn-danger" type="submit">Remove</button>
                                   </form>
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