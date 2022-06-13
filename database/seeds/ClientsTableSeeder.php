<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Client;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        foreach ($users as $user) {
            if($user->role == "client"){
                Client::create([
                    'user_id'=>$user->id,
                    'firstname'=>$faker->firstname,
                    'lastname'=>$faker->lastname,
                    'street'=>$faker->streetName,
                    'street_nr'=>rand(0,100),
                    'postcode'=>$faker->postcode,
                    'phone_number'=>$faker->phoneNumber,
                    'city'=>$faker->city,
                ]);
            }
        }
    }
}
