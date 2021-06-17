@extends('backend.layouts.master')
@section('title','Update quiz')
@section('content')
  <div class="span9">
      <div class="content">
        
           @if (Session::has('messeges'))
               <div class="alert alert-info">
                 {{Session::get('messeges')}}
               </div>
           @endif


           <form action="{{route('question.update',[$question->id])}}" method="post">@csrf
            {{method_field('PUT')}}
          <div class="module">
              <div class="module-head">
                  <h3>Update Question</h3>
              </div>
              <div class="module-body">
                  <div class="control-group">
                    <label for="" class="control-label">Choose Quiz</label>
                       <div class="controls">

                               <select name="quiz" class="span8">
                                <option value="">Select Quiz</option>
                                   @foreach (App\Models\Quiz::all() as $quiz)
                                   <option value="{{$quiz->id}}" @if($quiz->id==$question->quiz_id) selected @endif>{{$quiz->name}}</option> 
                                   @endforeach
                                </select>
                        
                                @error('quiz')
                                 <span class="invalid-feedback" role="alert">
                                 <P><strong>{{ $message }}</strong></P>
                                 </span>
                                  @enderror
                       </div>
                       <div class="controls">
                        <label for="question" class="control-label">Question Name</label>
                        <input type="text" name="question" class="span8" placeholder="Type Question here.." value="{{$question->question}}">
                               @error('question')
                              <span class="invalid-feedback" role="alert">
                              <P><strong>{{ $message }}</strong></P>
                              </span>
                               @enderror
                      </div>
                      <div class="controls">
                        <label for="options" class="control-label">Options</label>
                         @foreach($question->answers as $key=>$answer)
                            <input type="text" name="options[]" class="span6" placeholder="Options {{$key+1}}" value="{{$answer->answer}}" required >&nbsp;
                            
                            <input type="radio" name="correct_answer" value="{{$key}}"@if ($answer->is_correct) checked @endif><span> Is Correct Answer</span>
                         @endforeach
                      
                         @error('options')
                          <span class="invalid-feedback" role="alert">
                          <P><strong>{{ $message }}</strong></P>
                          </span>
                           @enderror
                        </div>
                         <div class="controls">
                             <button type="submit" class="btn btn-success">Submit</button>
                         </div>
                  </div>
              </div>

          </div>
          </form>
      </div>
      

  </div>

    
@endsection