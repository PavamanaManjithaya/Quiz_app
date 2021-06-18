@extends('backend.layouts.master')
@section('title','create User')
@section('content')
  <div class="span9">
      <div class="content">
        
           @if (Session::has('messeges'))
               <div class="alert alert-info">
                 {{Session::get('messeges')}}
               </div>
           @endif


           <form action="{{route('user.store')}}" method="post">@csrf
          <div class="module">
              <div class="module-head">
                  <h3>Create User</h3>
              </div>
              <div class="module-body">
                  <div class="control-group">
                       <label for="name" class="control-label">Name</label>
                       <div class="controls">
                           <input type="text" name="name" class="span8 @error('name')border-red @enderror" placeholder="Name.." value="{{old('name')}}" autofocus>
                           @error('name')
                           <span class="invalid-feedback" role="alert">
                           <P><strong>{{ $message }}</strong></P>
                           </span>
                            @enderror
                       </div>
                       <div class="controls">
                          <label for="email" class="control-label">Email</label>
                           <input id="email" type="email" class="span8 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      <div class="controls">
                        <label for="password" class="control-label">Password</label>
                         <input type="text" class="span8 @error('email') is-invalid @enderror" name="password" value="{{ old('password') }}">

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                      </div>
                    </div>
                    <div class="controls">
                      <label for="occupation" class="control-label">Occupation</label>
                       <input type="text" class="span8 @error('occupation') is-invalid @enderror" name="occupation" value="{{ old('occupation') }}">

                            @error('occupation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="controls">
                        <label for="address" class="control-label">Address</label>
                         <input type="text" class="span8 @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">
  
                              @error('address')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                      </div>
                      <div class="controls">
                        <label for="phone" class="control-label">Phone</label>
                         <input type="text" class="span8 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
  
                              @error('phone')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                      </div>
                      <div class="controls">
                        <label for="bio" class="control-label">BIO</label>
                         <input type="text" class="span8 @error('bio') is-invalid @enderror" name="bio" value="{{ old('bio') }}">
  
                              @error('bio')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                      </div>
                         <div class="controls">
                             <button type="submit" class="btn btn-success">Create User</button>
                         </div>
                  </div>
              </div>

          </div>
          </form>
      </div>
      

  </div>

    
@endsection