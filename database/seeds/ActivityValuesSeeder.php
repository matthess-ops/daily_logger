<?php

use App\ActivityLog;
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
            ActivityLog::create([
                'user_id'=>$client->user_id,
                'main_activities'=>json_encode(["first"=>["a"=>1,"b"=>2],"second"=>["a"=>1,"b"=>2]]),
                'scaled_activities'=>json_encode(["test","test"]),

            ]);
        }



    }
}
