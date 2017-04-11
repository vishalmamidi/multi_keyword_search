@extends('layouts.app')

@section('content')

    <form>
        <div class="container">
           
           
            <div class="row">
              <div class="col-md-8 col-md-offset-2">

                  <div class="panel panel-default">
                     <div class="panel-heading">Search</div>

                     <div class="panel-body">
                        

                  
                   
                                 <div class="form-group">
                                    <div class="input-group input-group-md">
                                        <div class="icon-addon addon-md">                       
                                           <input type="text" 
                                                  placeholder="What are you looking for?" 
                                                  class="form-control" 
                                                  v-model="query">
                                        </div>
                                        <span class="input-group-btn">
                
                                            <button class="btn btn-default" 
                                                    type="submit" 
                                                    value="submit" 
                                                    @click="search()" 
                                                    v-if="!loading">Search!
                                            </button> 
                
                                            <button class="btn btn-default" 
                                                    type="button" 
                                                    disabled="disabled" 
                                                    v-if="loading">Searching...
                                            </button>
                                            
                                        </span>
                                    </div>
                                 </div>


                  </div>  {{-- panal body --}}
                 </div>   {{-- panal closing --}}



                <hr>




            <div class="alert alert-danger" role="alert" v-if="error">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                @{{ error }}
            </div>


            <div id="products" class="row list-group">
            <div class="item col-xs-4 col-lg-4" v-for="product in products">
                <div class="thumbnail ">
                        
                        <div class="caption">
                            <h4 class="group inner list-group-item-heading">@{{ product.title }}</h4>
                            <p class="group inner list-group-item-text">@{{ product.description }}</p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <a class="btn btn-success" href="/posts/@{{ product.id }}">View Post</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>   {{-- container --}}


</form>

@endsection
