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
        // retrieve $activityLog = ActivityLog::find($id); // contains the activity_data that should be updated
        //retireve activitity values of the user: ActivityValue::where("user_id", Auth::id())->first();
        // get from input the boxOn. If there is not boxOn input dont continues
        
        // from activity_values table get the main_activities and the scaled_activities
        // retriueve for mainActivity input id the activity value of the mainActiviyt input id

        // foreach input boxon id. change the corresponding box value of the main_acitivty and the scaled_activites.
        // to the input values oft the associated mainActivty and scaledActivity.
        if($request->has('boxOn')){

          $activityLog = ActivityLog::find($id);
          $activityData = $activityLog->activity_data;
          error_log("box input exists");
          $boxInputIds = $request->input("boxOn");
          $mainActivityId = $request->input("mainActivity");
          $scaledActivityIds = $request->input("scaled");
          $activityValues = ActivityValue::where("user_id", Auth::id())->first();
          $scaledActivities = $activityValues->scaled_activities;
          $mainActivities = $activityValues->main_activities;
         
          // main activity values needed to update the box data
          $inputMainActivityName = $mainActivities[array_search($mainActivityId , array_column($mainActivities, 'id'))]["activity"];
          $inputMainActivityColor= $mainActivities[array_search($mainActivityId , array_column($mainActivities, 'id'))]["color"];
          error_log("main act color name ".$inputMainActivityColor." ".$inputMainActivityName);

          // scaled needed values

          error_log("scaled ids ".json_encode($scaledActivityIds));
          foreach ($scaledActivityIds as $scaledActivity) {
            error_log(gettype($scaledActivity));
            $decodedScaledActivity = json_decode($scaledActivity,true);
            error_log("the scaled id ".json_encode($decodedScaledActivity));
             $decodedScaledActivityName = $scaledActivities[array_search($decodedScaledActivity["id"]  , array_column($scaledActivities, 'id'))]['activity'];
            error_log("name scaled =".$decodedScaledActivityName);
            $decodedScaledActivity["name"] = $decodedScaledActivityName;
            $decodedScaledActivity["score"] =  $decodedScaledActivity["value"];
            unset( $decodedScaledActivity["value"]);

            error_log(json_encode($decodedScaledActivity));

            // change stuf give everything an id you dont want difficulaties na denken hoe je het makkelijkst spul kan fixen
          }

        }
        //   foreach ($boxInputIds as $boxId) {
        //     error_log("box id = ".$boxId);
        //     $boxData = $activityData[$boxId];
        //     error_log(gettype($boxData));
        //     // $boxData = $activityData::where("id",$boxId);
        //     // error_log(gettype($boxData));
        //   }
        // }else{

        //   error_log("no box input extist");
        // }
        





        // $activityLog = ActivityLog::find($id);
        // $activityValues = ActivityValue::where("user_id", Auth::id())->first();
        // $scaledActivityInputs = array_filter($inputs, function($key) {
        //     return substr($key,0,6) == "scaled";
        //   }, ARRAY_FILTER_USE_KEY);
        // $checkBoxInputs =array_filter($inputs, function($key) {
        //     return substr($key,0,3) == "box";
        //   }, ARRAY_FILTER_USE_KEY);
   
        //   error_log("--------------");
        //   error_log(json_encode($activityLog));




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
