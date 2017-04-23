@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                @if( Auth::User()->status == 1 || (Auth::User()->role == 'admin')  )
                      <!-- if user is activated by the administrator  -->
                      <div class="panel-heading">Dashboard</div>   
                      <div class="panel-body">
                          You are logged in!
                      </div>

                @else

                     <!-- if user is not  activated by the administrator  -->
                     <div class="panel-heading"><span class="text-danger"><b><h4>Attention!<h4></b><span></div>
                     <div class="panel-body">
                         Your Account needs to be activated my the administrator 
                     </div>  

                @endif

            </div>
        </div>
    </div>
</div>
@endsection
