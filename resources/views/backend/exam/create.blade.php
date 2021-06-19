@extends('backend.layouts.master')
@section('title','create question')
@section('content')
  <div class="span9">
      <div class="content">
        
           @if (Session::has('messeges'))
               <div class="alert alert-info">
                 {{Session::get('messeges')}}
               </div>
           @endif


           <form action="{{route('exam.assign')}}" method="post">@csrf
          <div class="module">
              <div class="module-head">
                  <h3>Assign Quiz</h3>
              </div>
              <div class="module-body">
                  <div class="control-group">
                    <label for="" class="control-label">Choose Quiz</label>
                       <div class="controls">

                               <select name="quiz" class="span8">
                                <option value="">Select Quiz</option>
                                   @foreach (App\Models\Quiz::all() as $quiz)
                                   <option value="{{$quiz->id}}">{{$quiz->name}}</option> 
                                   @endforeach
                                </select>
                        
                                @error('quiz')
                                 <span class="invalid-feedback" role="alert">
                                 <P><strong>{{ $message }}</strong></P>
                                 </span>
                                  @enderror
                       </div>
                       <div class="controls">

                        <select name="user" class="span8">
                         <option value="">Select User</option>
                            @foreach (App\Models\User::where('is_admin','0')->get() as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option> 
                            @endforeach
                         </select>
                 
                         @error('quiz')
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