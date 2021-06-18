@extends('backend.layouts.master')
@section('title','All User')
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
                <h3>All Users</h3>
            </div>
            <div class="module-body">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Password</th>
                             <th>Occupation</th>
                             <th>Address</th>
                             <th>Phone</th>
                             <th>Bio</th>
                             <th></th>
                             <th></th>
                         </tr>
                     </thead> 
                     <tbody>
                         @if (count($users)>0)
                         @foreach ($users as $key=>$user)
                           <tr>
                               <td>{{$key+1}}</td>
                               <td>{{$user->name}}</td>
                               <td>{{$user->email}}</td>
                               <td>{{$user->visible_password}}</td>
                               <td>{{$user->occupation}}</td>
                               <td>{{$user->address}}</td>
                               <td>{{$user->phone}}</td>
                               <td>{{$user->bio}}</td>
                               <td>
                                <a href="{{route('user.edit',[$user->id])}}"><button class="btn btn-primary">Edit</button></a>
                            </td>
                               <td>
                                     <form action="{{route('user.destroy',[$user->id])}}" id="delete-form{{$user->id}}" method="POST">@csrf
                                        {{method_field('DELETE')}}
                                     </form>
                                <a href="#" onclick="if(confirm('Do You Want to delete??')){
                                    event.preventDefault();
                                    document.getElementById('delete-form{{$user->id}}').submit()
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
                            <tr>No Question to display..</tr>  
                         @endif
                         
                     </tbody>
                 </table>
                 <div class="pagination pagination-centered">
                    {{$users->links()}}
                 </div>
                 
            </div>
        </div>    
    </div>
</div>


@endsection