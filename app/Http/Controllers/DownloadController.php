<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Post;
use Storage;
use finfo;


class DownloadController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth');
    }


     public function download($hash_name)
    {
       $post = new Post;     
       $post = Post::where('hash_name',$hash_name)->first();
       
       $encryptedcontent = Storage::get($post->file_path);
       $decryptedcontent = Crypt::decrypt($encryptedcontent);    

       return response()->make($decryptedcontent, 200, array(
            'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($decryptedcontent),
            'Content-Disposition' => 'attachment; filename="' . pathinfo($post->client_name, PATHINFO_BASENAME) . '"'
         ));   

      
    }

}
