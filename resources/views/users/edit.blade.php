@extends('layouts.app')

@section('content')

  
  <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">


          <a href="/users" class="btn btn-sm btn-success">
          Back...  
          </a>



            <div class="panel panel-default">
            <div class="panel-heading">Updating Profile of  {{ strtoupper($user->name) }}</div>


                <div class="panel-body">
                    <form class="form-horizontal" 
                          role="form" 
                          method="POST" 
                          action="/users/{{ $user->id }}">

                          {{ csrf_field() }}

                      {{-- hidden input PATCH for Update requeried  --}}
                      <input type="hidden" name="_method" value="PATCH">
                      
                      
                      {{--   name    --}}
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}"  autofocus>
                            </div>
                        </div>


                      {{--   user type   --}}
                        <div class="form-group">
                            <label for="role" class="col-md-4 control-label">User Type</label>

                            <div class="col-md-6">
                                <input id="role" type="text" class="form-control" name="role" value="{{$user->role}}"  autofocus>
                            </div>
                        </div>


                      {{--   verified status    --}}

                        <div class="form-group">
                            <label for="verified" class="col-md-4 control-label">verified Status</label>

                            <div class="col-md-6">
                                <input id="verified" type="text" class="form-control" name="verified" value="{{$user->verified}}"  autofocus>
                            </div>
                        </div>

                        {{--   email    --}}

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" >

                            </div>
                        </div>
                       
                        {{--   password    --}}

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="*********" >

 
                            </div>
                        </div>

  

                        {{--   submit   --}}

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection



