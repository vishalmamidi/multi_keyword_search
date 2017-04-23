@extends('layouts.app')

@section('content')
    
<div class="container">
  <div class="row">
   <div class="col-md-10 col-md-offset-1">
   
    <a href="/users/create" class="btn btn-sm btn-success">
        Create a User
    </a>
    <hr>
    {{-- LIST ALL THE USERS --}}

    <table class="table table-hover table-striped table-border">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th class="override">Status</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ ucwords($user->name) }}</td>
                <td>{{         $user->email }}</td>
                <td>{{ ucwords($user->role) }}</td>

                <td class="override">    
                        @if($user->role != 'admin')

                          <form action="/status/{{ $user->id }}" method="get">                          
                                    {!! csrf_field() !!}
                                    
                                   
                                    <button type="submit" 
                                            class="btn btn-default btn-link"
                                            role="button">
                                                   @if($user->status)
                                                     Active
                                                   @else
                                                     In-active
                                                   @endif               
                                    </button>
                                    
                          </form>
       
                          
                       @endif
                </td>       

                <td>

               
                
                 <div class="dropdown">
                   <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     Action
                     <span class="caret"></span>
                   </button>
                   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="/users/{{ $user->id }}"     >View</a></li>
                        <li><a href="/users/{{ $user->id }}/edit">Edit</a></li>
                     
                     

                      @if(Auth::user()->email != $user->email )
                         
                      <li role="separator" class="divider"></li>

                      <li>
                         <a>
                           <form action="/users/{{ $user->id }}" method="POST">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                           </form>
                         </a>
                      </li>
                      @endif

                   </ul>
                 </div>




                </td>
            </tr>
            @endforeach 


        </tbody>
    </table>




@endsection