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
                <th>Joined</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->diffForHumans() }}</td>
                <td>
                    <ul class="list-inline list-unstyled">
                        <li><a href="/users/{{ $user->id }}" class="btn btn-link">View</a></li>
                        <li><a href="/users/{{ $user->id }}/edit" class="btn btn-link">Edit</a></li>
                       
                       @if(Auth::user()->email != $user->email )  {{-- if the displaying user is not logged in user we should not display delete --}}
                        <li>  <form action="/users/{{ $user->id }}" method="POST">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-link">Delete</button>
                              </form>
                        </li>
                       @endif

                    </ul>
                </td>
            </tr>
            @endforeach 


        </tbody>
    </table>




@endsection