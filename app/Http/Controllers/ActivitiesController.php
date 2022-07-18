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
    // update the activity logger data
    public function update(Request $request, $id)
    {
        // check if the user has changed one or more box inputs
        if ($request->has('boxOn')) {
            // find the activity log of interest and get the needed data
            $activityLog = ActivityLog::find($id);
            $activityData = $activityLog->activity_data;
            // get the main and scaled activities input
            $mainActivityId = $request->input("mainActivity");
            $scaledActivityIds = $request->input("scaled"); // array that contains the indexes of boxes that are checked
            //retrieve the values used for the scaled and main activities
            $activityValues = ActivityValue::where("user_id", Auth::id())->first();
            $scaledActivities = $activityValues->scaled_activities;
            $mainActivities = $activityValues->main_activities;

            // since the user inputted main and scaled activities are ids. The associated names of the activities of the ids needs to be retrieved for the activityvalues table

            $inputMainActivityName = $mainActivities[array_search($mainActivityId, array_column($mainActivities, 'id'))]["activity"];
            $inputMainActivityColor = $mainActivities[array_search($mainActivityId, array_column($mainActivities, 'id'))]["color"];
            $inputScaledActivities = [];
            //the input data of the scaled activities are send as json
            //json_encode(["id"=>$item['id'],"value"=>1],json_encode(["id"=>$item['id'],"value"=>1]))
            foreach ($scaledActivityIds as $scaledActivity) {
                // decoded the json data
                $decodedScaledActivity = json_decode($scaledActivity, true);
                // get name of the scaled activity id
                $decodedScaledActivityName = $scaledActivities[array_search($decodedScaledActivity["id"], array_column($scaledActivities, 'id'))]['activity'];
                $decodedScaledActivity["name"] = $decodedScaledActivityName;
                // add a new key of score with a value to the array
                $decodedScaledActivity["score"] =  $decodedScaledActivity["value"];
                // remove the key of value from the array because it aint neccessary.
                unset($decodedScaledActivity["value"]);
                // add all the updated scaled activities inputs to the array
                array_push($inputScaledActivities, $decodedScaledActivity);
            }
            // for each box input/15 min time input slot change the data.
            foreach ($request->input("boxOn") as $boxInput) {
                $activityData[(int) $boxInput]['color'] = $inputMainActivityColor;
                $activityData[(int) $boxInput]['main_activity'] = $inputMainActivityName;
                $activityData[(int) $boxInput]['scaled_activities'] = $inputScaledActivities;
            }
            $activityLog->activity_data = $activityData;
            // save the data
            $activityLog->save();
        }
        return redirect()->back();
    }
}
