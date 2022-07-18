<?php

use App\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Report;

class ReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // create for each client in the database 5 daily reports
    public function run()
    {
        // get all clients
        $clients = Client::all();
        foreach ($clients as $client) {
            // start date is 7 days ago
            $startDateTime = Carbon::now()->subDays(7);
            for ($i=0; $i < 7; $i++) { 
                $startDateTime->addDay();
                Report::create([
                    'user_id'=>$client->user_id,
                    'questions'=>["hoe voel je je","wat is je energie","wat is je humeur"],
                    'scores'=>[],
                    'filled'=> false,
                    'created_at'=>$startDateTime,
                    'started_at'=>$startDateTime,
                ]);
            }

        }
    }
}
