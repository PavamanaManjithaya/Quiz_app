@extends('backend.layouts.master')
@section('title','Quiz Question')
@section('content')

<div class="span9">
    <div class="content"> 
        
        @foreach ($quizes as $quiz)
            
       
        <div class="module">
            <div class="module-head">
                <h3>{{$quiz->name}}</h3>
            </div>
            <div class="module-body">
                <p><h3 class="heading"></h3></p>
                <div class="module-body table">
                    @foreach ($quiz->questions as $ques)
                        
                    
                 <table class="table table-messege"> 
                     <tbody>
                           <tr class="read">
                               {{$ques->question}}
                               
                              <td class="cell-author hidden-phone hidden-tablet">
                                @foreach ($ques->answers as $key=>$answer) 

                                  <p>{{$key+1}}.{{$answer->answer}}
                                  @if ($answer->is_correct)
                                  <span class="badge badge-success">correct</span>
                                  @endif
                                  </p>
                                  @endforeach  
                              </td>
                              

                           </tr>
                         
                     </tbody>
                 </table>
                 @endforeach
                </div>
                <div class="module-foot">
                    <a href="{{route('quiz.index')}}"><button class="btn btn-inverse">Back</button></a>
                 </div> 
                 
            </div>
            
        </div>
        @endforeach    
    </div>
</div>


@endsection