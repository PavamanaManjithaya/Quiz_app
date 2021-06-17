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
                
            </div>
            <div class="module-body">
                <p><h3 class="heading">{{$questions->question}}</h3></p>
                <div class="module-body table">
                 <table class="table table-messege"> 
                     <tbody>
                         @foreach ($questions->answers as $key=>$answer)
                           <tr class="read">
                              <td class="cell-author hidden-phone hidden-tablet">
                                  {{$key+1}}.{{$answer->answer}}
                                  @if ($answer->is_correct)
                                  <span class="badge badge-success pull-right">correct</span>
                                  @endif
                                  
                              </td>


                           </tr>
                         @endforeach
                     </tbody>
                 </table>
                </div>
                 <div class="module-foot">
                    <form action="{{route('question.destroy',[$questions->id])}}" id="delete-form{{$questions->id}}" method="POST">@csrf
                        {{method_field('DELETE')}}
                     </form>
                <a href="#" onclick="if(confirm('Do You Want to delete??')){
                    event.preventDefault();
                    document.getElementById('delete-form{{$questions->id}}').submit()
                }
                else{
                    event.preventDefault();
                }">
                <input type="submit" value="Delete" class="btn btn-danger">
                </a>

                <a href="{{route('question.edit',[$questions->id])}}"><button class="btn btn-primary">Edit</button></a>
                <a href="{{route('question.index')}}"><button class="btn btn-inverse pull-right">Back</button></a>

                 </div>
                 
                 
            </div>
        </div>    
    </div>
</div>


@endsection