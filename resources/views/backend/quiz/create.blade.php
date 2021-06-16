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


           <form action="{{route('quiz.store')}}" method="post">@csrf
          <div class="module">
              <div class="module-head">
                  <h3>Cretae Quiz</h3>
              </div>
              <div class="module-body">
                  <div class="control-group">
                    <label for="" class="control-label">Quiz name</label>
                       <div class="controls">
                        
                           <input type="text" name="name" class="span8" placeholder="Name of a quiz" value="{{old('name')}}">
                                  @error('name')
                                 <span class="invalid-feedback" role="alert">
                                 <P><strong>{{ $message }}</strong></P>
                                 </span>
                                  @enderror
                       </div>
                       <label for="" class="control-label">Quiz Description</label>
                       <div class="controls">
                         
                           <textarea name="description" class="span8" placeholder="Description about quiz" value="{{old('description')}}"></textarea>
                               @error('description')
                              <span class="invalid-feedback" role="alert">
                                <P><strong>{{ $message }}</strong></P>
                              </span>
                               @enderror
                        </div>
                        <div class="controls">
                            <label for="" class="control-label">Minutes</label>
                              <input type="text" name="minutes" class="span8" placeholder="Minutes" value="{{old('minutes')}}">
                                     @error('minutes')
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