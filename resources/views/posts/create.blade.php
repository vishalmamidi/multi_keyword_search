@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">


                <div class="panel-heading">Create Post</div>
                <div class="panel-body">

                    

                    <form method="post" 
                          action="{{ url('posts') }}" 
                          enctype="multipart/form-data">
                       
                      {{ csrf_field() }}

                      <div class="form-group">
                        <label >Title</label>
                        <input type="text" class="form-control" name="title" >

                         @if ($errors->has('title'))
                             <span class="help-block">
                                 <strong class="text-danger">{{ $errors->first('title') }}</strong>
                             </span>
                         @endif

                      </div>
                                       
                    
                      <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control"  rows="3" name="description"></textarea>
                      </div>
                    
                      <div class="form-group">
                        <label >Attach a file</label>
                        <input type="file" name="attachment" class="form-control-file"  >

                         @if ($errors->has('attachment'))

                             <span class="help-block">
                                 <strong class="text-danger">{{ $errors->first('attachment') }}</strong>
                             </span>
                         
                         @else

                                 <small class="form-text text-muted ">Only PDF txt and Docs, file size limited to 5MB.</small>
 
                         @endif

                      </div>
                    
                      
                      <button type="submit" class="btn btn-primary">Upload</button>
                    </form>

                     

                </div>
            </div>
        </div>
    </div>
</div>
@endsection