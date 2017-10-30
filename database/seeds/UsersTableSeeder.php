<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $password = Hash::make('secret');

        $users[] = [
            'id' => 1,
            'name' => 'Gabriel Angelus',
            'email' => 'gabriel@email.com',
            'password' => $password
        ];

        \App\User::insert($users);
    }

}
