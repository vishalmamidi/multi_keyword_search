@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
           <div class="col-md-8 col-md-offset-2">

            <a href="/posts" class="btn btn-sm btn-success">
            Back...  
            </a>

                <h1> {{ $post->title }} </h1>
                
                <h6>Posted: Admin
                    <span>{{ $post->created_at->diffForHumans() }}</span></h6>

                    <p> {{ $post->description }} </p>
  

                <div class="panel-body">
                <a href="/download/{{ $post->hash_name }}" class="btn btn-link"> {{ $post->client_name  }}</a></li>
                </div>

                  
                
                

           
        </div>
    </div>
</div>
@endsection