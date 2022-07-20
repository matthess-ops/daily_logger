<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // only an user is able to change its own password
    public function edit($id)
    {
        error_log("hitted");
        if(Auth::id() == $id){
            // echo "lafadf";
            return view('client.account.edit-password');

        }else{
            redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //function = update the client password
     //$id = used to check if the curent auth is the same id

    public function update(Request $request, $id)
    {
        if($id == Auth::id()){
            // get user
            $user = User::find(Auth::id());
            //validate the passwords
            $validatedData = $request->validate([
                'password_new' => 'required|confirmed|min:6',
                'password_new_confirmation'=>'required|min:6',
            ]);
            //update the password column in the user table with the newly encrypted password
            $user->password = bcrypt($request->input('password_new'));
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }else{
            redirect()->back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
