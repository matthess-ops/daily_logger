<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Client;
use App\ActivityLog;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;
use App\ActivityValue;


class ActivityLogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {





        $clients = Client::all();
        foreach ($clients as $client) {

            $activitiesValue= $client->activityValue;


            $dummyScaledActivitiesNotNull = [];
            foreach ($activitiesValue->scaled_activities as $scaledActivity) {
                array_push($dummyScaledActivitiesNotNull,['name'=>$scaledActivity["activity"], 'score'=>rand(0,10)]);
            }

            $dummyScaledActivitiesNull = [];
            foreach ($activitiesValue->scaled_activities as $scaledActivity) {
                array_push($dummyScaledActivitiesNull,['name'=>$scaledActivity["activity"], 'score'=>null]);
            }






            // error_log($randomMainActivity);
            $activityData = [];
            for ($i=0; $i < 96; $i++) {
                $pickedMainActivity = [];
                // $pickedMainActivityColor =[];
                $randInt = rand(0,3);
                if($randInt == 2){
                    $pickedMainActivity = null;
                    $pickedMainActivityColor =null;
                    $part = ["id"=>$i,"main_activity"=>$pickedMainActivity,"scaled_activities"=> $dummyScaledActivitiesNull ,"color"=>$pickedMainActivityColor];
                    array_push($activityData,$part);
                }else{
                    $randomInt = rand(0,count($activitiesValue->main_activities)-1);
                    $pickedMainActivity = $activitiesValue->main_activities[$randomInt];
                    // $pickedMainActivityColor = $activitiesValue->main_activities_colors[$randomInt];
                    $part = ["id"=>$i,"main_activity"=>$pickedMainActivity["activity"],"scaled_activities"=> $dummyScaledActivitiesNotNull ,"color"=>$pickedMainActivity["color"]];
                    array_push($activityData,$part);
                }


            }




            ActivityLog::create([
                'user_id'=>$client->user_id,
                'activity_data'=>$activityData,
                'date_today'=> Carbon::now()->format('Y-m-d')

            ]);
        }
    }
}
