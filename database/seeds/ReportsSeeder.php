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
                $randomInt = rand(0,2);
                $startDateTime->addDay();
                if($randomInt == 1){
                    Report::create([
                        'user_id'=>$client->user_id,
                        'questions'=>["hoe voel je je","wat is je energie","wat is je humeur"],
                        'scores'=>[3,4,5],
                        'filled'=> true,
                        'created_at'=>$startDateTime,
                        'filled_at'=>$startDateTime,
                    ]);
                }else{


                Report::create([
                    'user_id'=>$client->user_id,
                    'questions'=>["hoe voel je je","wat is je energie","wat is je humeur"],
                    'scores'=>[],
                    'filled'=> false,
                    'created_at'=>$startDateTime,
                    'filled_at'=>$startDateTime,
                ]);
            }
            }

        }
    }
}
