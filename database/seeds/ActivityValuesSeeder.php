<?php

use App\ActivityLog;
use App\ActivityValue;
use Illuminate\Database\Seeder;
use App\User;
use App\Client;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ActivityValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // for each client in clients table create an activityvalues row
    //
    public function run()
    {

        $clients = Client::all();
        foreach ($clients as $client) {
            ActivityValue::create([
                'user_id'=>$client->user_id,
                // $part = ["id"=>$i,"main_activity"=>$pickedMainActivity,"scaled_activities"=> $dummyScaledActivitiesNotNull ,"color"=>$pickedMainActivityColor];
                // 'main_activities_colors'=>["#f5b342","#f5b342","#42ecf5","#f54290","#9042f5"],

                'main_activities'=>[
                    ["id"=> 0,"activity"=>"werken","color"=>"#f5b342"],
                    ["id"=> 1,"activity"=>"gamen","color"=>"#42ecf5"],
                    ["id"=> 2,"activity"=>"koken","color"=>"#f54290"],
                    ["id"=> 3,"activity"=>"afwassen","color"=>"#9042f5"],
                ],

                'scaled_activities'=>[
                    ["id"=> 0,"activity"=>"humeur"],
                    ["id"=> 1,"activity"=>"spanning"],
                    ["id"=> 2,"activity"=>"blijheid"],
                ],



                // 'main_activities'=>["werken","programmeren","gamen","koken","afwassen"],
                // 'scaled_activities'=>["humeur","spanning","blijheid"],
                // 'main_activities_colors'=>["#f5b342","#f5b342","#42ecf5","#f54290","#9042f5"],

            ]);
        }

        // $table->id();
        // $table->timestamps();
        // $table->string('user_id');
        // $table->json('scaled_activities');
        // $table->json('main_activities');
        // $table->json('main_activities_colors');



    }
}
