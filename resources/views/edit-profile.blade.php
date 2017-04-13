@extends('layouts.app')

<link href="/css/profilepic.blade.css" rel="stylesheet">

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Uploading Profile Picture</div>
                <div class="panel-body">


                    <form class="form-horizontal" 
                          method="POST" 
                          action="/update" 
                          enctype="multipart/form-data">

                           {{ csrf_field() }}


                              {{-- hidden input PATCH for Update requeried  --}}
                              <input type="hidden" name="_method" value="PATCH">


 

                                     &nbsp


                                    <div class="form-group">
                                       
                                       <img class="img-responsive center-block" 
                                            src={{ Auth::user()->dp_url  }}  
                                            >
                                    </div> 

                                    
                                    

                                     &nbsp
     


                            {{--   upload    --}}
                             <div class="form-group">
                                 <label  class="col-md-4 control-label">Upload Image</label>
     
                                 <div class="col-md-6">
                                     <input type="file" name="dp"   class="form-control">

                                     @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                 </div>
                             </div>    


                                 

                      
                      {{--   name    --}}
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}"  autofocus>
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
