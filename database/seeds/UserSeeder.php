<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'username' => 'Hazriel',
            'email' => 'hazrielgaming@gmail.com',
            'password' => bcrypt('danstaface'),
            'activated' => true,
            'banned' => false
        ]);
    }
}
