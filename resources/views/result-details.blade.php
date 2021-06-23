@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>Your Result </center>
            @foreach ($results as $key=>$result)
                
            
            <div class="card">
                <div class="card-header">{{$key+1}}</div>
                    
                
                <div class="card-body">
                    <p>
                         <h3>
                             {{$result->question->question}}
                         </h3>

                    </p>
                    @php
                        $i=1;
                        $answers=DB::table('answers')->where('question_id',$result->question_id)->get();
                        foreach ($answers as $ans) {
                           echo'<p>'.$i++.')'.$ans->answer.'</p>';
                        }
                    @endphp
                    <p><mark>
                        Your Answer:{{$result->answer->answer}}
                    </mark></p>
                    @php
                        $correctAnswer=DB::table('answers')->where('question_id',$result->question_id)->where('is_correct',1)->get();
                        foreach ($correctAnswer as $ans) {
                            echo '<p class="text-info">Correct Answer:'.$ans->answer.'</p>';
                        }
                        
                    @endphp
                    @if ($result->answer->is_correct)
                     <p>
                        <span class="badge badge-success">Result: Correct</span>   
                    </p>   
                    @else
                    <p>
                        <span class="badge badge-danger">Result: InCorrect</span>   
                    </p>  
                    @endif
                  
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
