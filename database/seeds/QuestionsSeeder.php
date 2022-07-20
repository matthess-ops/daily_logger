<?php

use App\Client;
use App\ReportQuestion;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Question\Question;

class QuestionsSeeder extends Seeder
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
        ReportQuestion::create([
            'user_id'=>$client->user_id,
            'questions'=>["hoe voel je je","wat is je energie","wat is je humeur"],

            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
       }
    }
}
