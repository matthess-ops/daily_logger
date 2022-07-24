<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create(['role'=>'admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('password')]);
        factory(User::class)->create(['role'=>'client', 'email' => 'client@gmail.com', 'password' => bcrypt('password')]);
        factory(User::class)->create(['role'=>'mentor', 'email' => 'mentor@gmail.com', 'password' => bcrypt('password')]);

        factory(User::class, 100)->create();

    }
}
