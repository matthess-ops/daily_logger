<?php

namespace App\Http\Controllers;

use App\ActivityLog;
use Illuminate\Http\Request;
use App\Client;
use App\User;
use App\ActivityValue;

class TestController extends Controller
{
    public function clientnaw(){
        error_log("dit werkt");
        // $clientnaw = Client::all();
        // $userdata = $clientnaw->user;
        // $users = User::all();
        // $client = $users->client;
        // return view('test.testmiddleware',compact('users'),compact('client'));
    }

    public function testpost(Request $request){
        error_log("testpost click lauched");
        error_log(json_encode($request->all()));
        error_log("firstname ". $request->input("firstname"));
        $data = ActivityLog::find(1);
        error_log("data id is ".$data->id);
        return response()->json([
            'data'        => $data,
            'message' =>   'Enter email adress'
        ]);    }
}
