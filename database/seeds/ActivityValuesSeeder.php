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
                // 'main_activities'=>json_encode([]),
                'main_activities'=>json_encode(["werken","programmeren","gamen","koken","afwassen"]),
                'scaled_activities'=>json_encode(["humeur","spanning","blijheid"]),
                'main_activities_colors'=>json_encode(["#f5b342","#f5b342","#42ecf5","#f54290","#9042f5"]),

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
