<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createRole('Admin', 'admin', 'Admin group.');
        $this->createRole('Moderator', 'mod', 'Moderator group.');
        $this->createRole('Member', 'member', 'Member group.');
    }

    private function createRole($name, $slug, $description)
    {
        \App\Role::create([
            'name' => $name,
            'slug' => $slug,
            'description' => $description
        ]);
    }
}
