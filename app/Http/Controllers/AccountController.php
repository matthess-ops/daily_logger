<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //function = toggle the state of the client account between active and inactive
    //id = the id of the client/user of interest.

    public function toggleClientAccount($id){
        // get the user
        $user = User::find($id);
        // set the account_status either to false or true
        if($user->account_status){
            $user->account_status = false;
        }else{
            $user->account_status = true;
        }
        $user->save();
        return redirect()->back();
    }
}
