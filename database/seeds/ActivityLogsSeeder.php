<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Client;
use App\ActivityLog;


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
            ActivityLog::create([
                'user_id'=>$client->user_id,
                'main_activities'=>json_encode(["test","test"]),
                'scaled_activities'=>json_encode(["test","test"]),
            
            ]);
        }
    }
}
