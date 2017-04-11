<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


// to identify user and perfor some auth tasks
use Storage;
use App\User;
use App\Post;
use Auth;
use File;


class PostController extends Controller
{


   public function __construct()
    {
       $this->middleware('auth');
    }

   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        
        return view('posts.posts',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        
        //validation
       

        $this->validate($request, [
           'title' => 'required|unique:posts|max:255',
           'attachment'  => 'required|mimes:pdf,doc,docs,txt|max:5000'
        ]);





        
        $post               = new Post;

        //if file exists
        if ($request->hasFile('attachment')) 
          {

                
                $file = $request->file('attachment');      // get the file instance
                $path       = $file->store('','s3');            // save and return the path of file 
                          
                        

                $post->file_path   = $path;
                $post->client_name = $file->getClientOriginalName();
                $post->client_ext  = $file->extension(); 
                $post->hash_name   = $file->hashName();
                
               
          }   


        $post->user_id      = Auth::id();
        $post->title        = $request->input('title');
        $post->description  = $request->input('description');
        

        $post->save();


        // encrypting 

       $fileContent = Storage::get($file->hashName());
       Storage::put($file->hashName(),Crypt::encrypt($fileContent));

         // decrypteding 

         //sfsd

        // $file = Storage::get('ex.encrypted.txt');
        // Storage::put('ex.decrypted.txt',Crypt::decrypt($file));
  
      
        



         return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect('/posts');
    }


    public function search()
    {
        return view('posts.search');
    }

   
   public function searching($query)
   {
       $posts =  Post::search($query)->get();
       return view('posts.search',compact('posts'));
   }



    public function myposts()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('posts.myposts',compact('user'));
    }

    

}
