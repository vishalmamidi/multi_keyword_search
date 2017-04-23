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
            
            <div class="panel-heading">Create User</div>


                <div class="panel-body">
                    <form class="form-horizontal" 
                          role="form" 
                          method="POST" 
                          action="{{ url('/users') }}">

                          {{ csrf_field() }}


                      {{--   name    --}}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        {{--   user type   --}}
                        <div class="form-group">
                            <label for="role" class="col-md-4 control-label">User Type</label>

                            <div class="col-md-6">
                                 
                                 <select class="form-control" name='role'>
                                     <option value="viewer" selected>Viewer</option>
                                     <option value="user">User</option>
                                     <option value="admin">Admin</option>
                                </select>

                            </div>



                        </div>


                      {{--   verified status    --}}

                        <div class="form-group">
                            <label for="verified" class="col-md-4 control-label">verified Status</label>

                            <div class="col-md-6">
                                <select class="form-control" name='verified'>
                                     <option value="1" selected>Verified</option>
                                     <option value="0">Un-Verified</option>
                                </select>
                            </div>
                        </div>


                      {{--   account status    --}}

                        <div class="form-group">
                            <label for="status" class="col-md-4 control-label">Account Status</label>

                            <div class="col-md-6">
                                <select class="form-control" name='status'>
                                     <option value="1" selected>Active</option>
                                     <option value="0">in-active</option>
                                </select>
                            </div>
                        </div>


                        {{--   email    --}}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        {{--   password    --}}

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input  type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

  

                        {{--   submit   --}}

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create User
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



