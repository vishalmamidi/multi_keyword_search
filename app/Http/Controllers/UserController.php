<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// to identify user and perfor some auth tasks
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;


class UserController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('admin');
    }




    public function index()
    {    
        Session::flash('message', 'index flash');
        $users = User::get();
        return view('users.users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Session::flash('message', 'create flash');
        return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $this->validate($request, [
           'name'  => 'required',
           'email' => 'required|unique:users',
           'passward'  => 'required',
           
        ]);



        // create a new user object
        $user           = new User;
        $user->name     = $request->input('name');
        $user->role     = $request->input('role');
        $user->verified = $request->input('verified');
        $user->email    = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        Session::flash('message', 'user has been created successfully');
        // redirect back to the users list
        return redirect('users');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $user = User::find($id);
        return view('users.edit',compact('user') );
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
        // get all the data for our user
        $user = User::find($id);

        $userData = array_filter($request->all());
        if (isset($userData['password']))
            $userData['password'] = bcrypt($userData['password']);

        // update that user
        $user->fill($userData);
        $user->save();

        // redirect back to the users list
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/users');
    }



}
