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
                          action="/store" 
                          enctype="multipart/form-data">

                           {{ csrf_field() }}

 

                                     &nbsp


                                    <div class="form-group">
                                       <span> {{ Storage::disk('s3')->url('avatars/').Auth::id().'/avatar.jpg'   }}</span>
                                       <img class="img-responsive center-block" 
                                            src="{{ Storage::disk('s3')->url('avatars/').Auth::id()."/avatar.jpg"   }}"  
                                            >
                                    </div> 
                                    

                                     &nbsp
     


                            {{--   upload    --}}
                             <div class="form-group">
                                 <label for="image" class="col-md-4 control-label">Upload Image</label>
     
                                 <div class="col-md-6">
                                     <input type="file" name="image" id="image"  class="form-control">

                                     @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                 </div>
                             </div>    


                                    &nbsp

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
