<?php

namespace App\Http\Controllers;

use App\ActivityLog;
use App\ActivityValue;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ActivitiesController extends Controller
{
    public function edit()
    {

        $activityLog = ActivityLog::where("user_id", Auth::id())->where('date_today', Carbon::now()->format('Y-m-d'))->first();
        $activityValues = ActivityValue::where("user_id", Auth::id())->first();

        return view('client.activities.activities-logger', compact('activityLog', 'activityValues'));
    }

    public function update(Request $request, $id)
    {
        error_log("id is " . $id);
        error_log(json_encode($request->all()));
        $inputs =$request->all();
        $activityLog = ActivityLog::find($id);
        $activityValues = ActivityValue::where("user_id", Auth::id())->first();
        $scaledActivityInputs = array_filter($inputs, function($key) {
            // error_log("this is a key ". $key." ".substr($key,0,6) );
            return substr($key,0,6) == "scaled";
          }, ARRAY_FILTER_USE_KEY);
        $checkBoxInputs =array_filter($inputs, function($key) {
            return substr($key,0,3) == "box";
          }, ARRAY_FILTER_USE_KEY);
        //   error_log(json_encode($checkBoxInputs));
        //   error_log("scaled inputs ".json_encode($scaledActivityInputs));
          error_log("--------------");
          error_log(json_encode($activityLog));




        // $activityData = $activityLog->activity_data;
        // foreach ($request->all() as $key => $input) {
        //    if(substr($key,0,3) == "box"){
        //     $boxID =  explode("_",$key)[1];
        //     error_log(json_encode($activityData[$boxID]));
        //     $mainValues = $activityValues->main_activities;
        //     $activity = $mainValues[$request->input('mainActivity')];
        //     error_log(json_encode($request->all()));
        //     $activityData[$boxID]["main_activity"] = $activity["activity"];
        //     $activityData[$boxID]["color"] = $activity["color"];
        //     // $activityData[$boxID]["scaled_activities"] =
        //     $newScaledActivities =

        //    }
        // }

        return redirect()->back();

    }
}
