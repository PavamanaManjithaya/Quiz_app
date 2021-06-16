@extends('backend.layouts.master')
@section('title','create quiz')
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
                <h3>All Quiz</h3>
            </div>
            <div class="module-body">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>NAME</th>
                             <th>DESCRIPTION</th>
                             <th>MINUTES</th>
                             <th></th>
                             <th></th>
                             <th></th>
                         </tr>
                     </thead> 
                     <tbody>
                         @if (count($quizes)>0)
                         @foreach ($quizes as $key=>$quiz)
                           <tr>
                               <td>{{$key+1}}</td>
                               <td>{{$quiz->name}}</td>
                               <td>{{$quiz->description}}</td>
                               <td>{{$quiz->minutes}}</td>
                               <td>
                                   <a href="{{route('quiz.edit',[$quiz->id])}}"><button class="btn btn-primary">Edit</button></a>
                               </td>
                               <td>
                                     <form action="{{route('quiz.destroy',[$quiz->id])}}" id="delete-form{{$quiz->id}}" method="POST">@csrf
                                        {{method_field('DELETE')}}
                                     </form>
                                <a href="#" onclick="if(confirm('Do You Want to delete??')){
                                    event.preventDefault();
                                    document.getElementById('delete-form{{$quiz->id}}').submit()
                                }
                                else{
                                    event.preventDefault();
                                }">
                                <input type="submit" value="Delete" class="btn btn-danger">
                                </a>


                               </td>
                           </tr>  
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