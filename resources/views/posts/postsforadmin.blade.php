@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
     @if(Auth::User()->role == 'viewer')
        <a href="/home" class="btn btn-sm btn-success">
        back
        </a>          
        <hr>  
     @else
        <a href="/posts/create" class="btn btn-sm btn-success">
        Create a Post
        </a>          
        <hr>
     @endif

    {{-- LIST ALL THE USERS --}}

    <table class="table table-hover table-striped table-border">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Posted</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}        </td>
                
                
                <td>  {{ucwords( $post->user->name )}}  </td>


                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>
                    <ul class="list-inline list-unstyled">

                        <li><a href="/posts/{{ $post->id }}" class="btn btn-link">View</a></li>
                        
                         <li>  
                              <form action="/posts/{{ $post->id }}" method="POST">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-link">Delete</button>
                              </form>
                        </li>

                    </ul>
                </td>

            </tr>
            @endforeach 


        </tbody>
    </table>









            
        </div>
    </div>
</div>
@endsection
