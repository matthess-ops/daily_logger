<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Client;
use App\ActivityLog;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;


class ActivityLogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $activityData = [];
        for ($i=0; $i < 96; $i++) { 
            $part = ["id"=>$i,"main_activity"=>"","scaled_activities"=>[],"color"=>""];
            array_push($activityData,$part);
        }


        $clients = Client::all();
        foreach ($clients as $client) {
            ActivityLog::create([
                'user_id'=>$client->user_id,
                'activity_data'=>json_encode($activityData),
                'date_today'=> Carbon::now()->format('Y-m-d')

            ]);
        }
    }
}
