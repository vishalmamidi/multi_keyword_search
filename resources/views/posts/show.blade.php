@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
           <div class="col-md-8 col-md-offset-2">

            <a href="/posts" class="btn btn-sm btn-success">
            All Posts 
            </a>
            <hr>
            <div class="panel panel-default">
                <div class="panel-heading"> {{    $post->title  }} </div>

                <div class="panel-body">
                  <div class="col-md-4">
                   <p> {{ $post->description }} </p>
                  </div> 
                </div>

                
                

                <div class="panel-body">
                <a href="/download/{{ $post->hash_name }}" class="btn btn-link"> {{ $post->client_name  }}</a></li>
                </div>
  
                <div class="panel-body text-right">
                  <span> Posted by.. </span>
                  <span class="label label-danger"> {{ucwords( $post->user->name )}} </span>
                 </div> 
                
                

            </div>
        </div>
    </div>
</div>
@endsection