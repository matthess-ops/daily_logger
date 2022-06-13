<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\User;

class TestController extends Controller
{
    public function clientnaw(){

        // $clientnaw = Client::all();
        // $userdata = $clientnaw->user;
        $users = User::all();
        $client = $users->client;
        return view('test.testmiddleware',compact('users'),compact('client'));
    }
}
