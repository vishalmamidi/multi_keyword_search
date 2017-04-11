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
                  <span> By.. </span>
                   
                 
                  <span><img src= {{ $post->user->dp_url }} style="width:25px;height:25px;border-radius:50%;"> </span>
                 </div> 
                
                

            </div>
        </div>
    </div>
</div>
@endsection