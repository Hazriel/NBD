<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        $this->createPermission('admin.access');
        $this->createPermission('admin.ban');
        $this->createPermission('admin.update-users');
        $this->createPermission('admin.delete-users');

        // Forum
        $this->createPermission('category.create');

        // News
        $this->createPermission('news.create');
        $this->createPermission('news.update');
        $this->createPermission('news.delete');
    }

    private function createPermission($name)
    {
        Permission::create(['name' => $name]);
    }
}
