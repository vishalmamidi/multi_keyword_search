@extends('layouts.app')

@section('content')

   


  <div class="container">
    <div class="row"> 
       <div class="col-md-8 col-md-offset-2">


        <a href="/users" class="btn btn-sm btn-success">
          Back...  
        </a>
        <hr>
        
            <div class="panel panel-default">
            <div class="panel-heading"> {{ $user->name }}'s  Profile  </div>
 
            <div class="panel-body">
               
             {{--   name    --}}
                        <div class="form-group">
                            <label class="col-md-4 control-label"><h3> Name                </h3></label>
                            <label class="col-md-6 control-label"><h3> {{ $user->name }}   </h3></label>
                        </div>

                                     {{--   email   --}}
                        <div class="form-group">
                            <label class="col-md-4 control-label"><h3> email                </h3></label>
                            <label class="col-md-8 control-label"><h3> {{ $user->email }}   </h3></label>
                        </div>

                                     {{--   role   --}}
                        <div class="form-group">
                            <label class="col-md-4 control-label"><h3> Role                </h3></label>
                            <label class="col-md-6 control-label"><h3> {{ $user->role }}   </h3></label>
                        </div>

                                     {{--   status   --}}
                        <div class="form-group">
                            <label class="col-md-4 control-label"><h3> Status               </h3></label>
                            <label class="col-md-6 control-label"><h3>  @if ( ($user->verified)==0 ) 
                                                                             Un-verified
                                                                        @else
                                                                             verified
                                                                        @endif       
                                                                                             </h3></label>
                       





           </div>  


         </div>
        </div>
    </div>
</div>

@endsection