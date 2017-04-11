<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use Session;
use Storage;
use File;
class ProfileController extends Controller
{
    
   
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function edit()
    {
       $user = Auth::user();
       return view('edit-profile',compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $userData = array_filter($request->all());
        if (isset($userData['password']))
            $userData['password'] = bcrypt($userData['password']);

if ($request->hasFile('dp'))
 {
    
        $file = request()->file('dp');
        $ext  = $file->extension();
       


        $file -> storeAs( 'Profilepics/' . auth()->id(), "dp.{$ext}");
        $user->dp_url =  Storage::disk('s3')->url('Profilepics/' . auth()->id(). "/dp.{$ext}");      


 }
        // update that user
        $user->fill($userData);
       
        $user->save();

        return back();
       
        
    }



}
