<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ActivityValuesSeeder::class);
        $this->call(ActivityLogsSeeder::class);
        $this->call(ReportsSeeder::class);
        $this->call(QuestionsSeeder::class);



    }
}
