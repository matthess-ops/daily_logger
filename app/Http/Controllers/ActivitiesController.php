<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityLog;
use App\ActivityValue;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ActivitiesController extends Controller
{
    public function edit(){

        error_log("stuff is called auth id ".Auth::id());
        $activityLog=ActivityLog::where("user_id",Auth::id())->where('date_today',Carbon::now()->format('Y-m-d'))->first();
        $activityValues=ActivityValue::where("user_id",Auth::id())->first();
        error_log("type is ".gettype($activityLog->activity_data));
        error_log("lefakc ".$activityLog->activity_data[0]);

        // error_log("activity log =".json_encode($activityLog));

        
        // $activityLog->activity_data = json_decode($activityLog->activity_data);
        
        // $activityValue = $user->
        // $user= User::find(Auth::id());
        // $activityLog = $user->activityLog;
        // $activityValue = $user->

        return view('client.activities.activities-logger',compact('activityLog','activityValues'));
    }
}