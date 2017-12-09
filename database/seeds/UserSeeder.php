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

        $admin = \App\Role::where('slug', 'admin')->first();

        if ($admin != null) {
            \Illuminate\Support\Facades\DB::table('role_user')->insert([
                'user_id' => $user->id,
                'role_id' => $admin->id
            ]);
        }
    }
}
