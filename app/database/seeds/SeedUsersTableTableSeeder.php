<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SeedUsersTableTableSeeder extends Seeder {

    public function run()
    {
DB::table('users')->truncate();

$users = [

            [
                'first_name' => 'Karolis',
                'last_name' => 'Gradickas',
                'email' => 'magnuxxx@inbox.lt',
                'password' => Hash::make('asdasd')
            ],

        ];

        foreach($users as $user){
            User::create($user);
        }
    }

}