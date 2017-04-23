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


          <div id="posts" class="row list-group">

          @foreach ($posts as $post)

            <div class="item col-xs-4 col-lg-4" >
                <div class="thumbnail">
                        
                        <div class="caption">
                            <h4 class="group inner list-group-item-heading"><b> {{ $post->title }} </b></h4>
                            <p class="group inner list-group-item-text">{{ $post->description }}</p>
                            
                            <div class=" text-right">
                                            
                               <a class="btn btn-success " href="/posts/{{ $post->id }}">View Post</a> 

                            </div> 
                            
                            

                        </div>

                    </div>
                </div>
             @endforeach  

            </div>





        </tbody>
    </table>









            
        </div>
    </div>
</div>
@endsection
