<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createPermission('user.create', 'Is able to create users.');
        $this->createPermission('user.update', 'Is able to update users.');
        $this->createPermission('user.delete', 'Is able to delete users.');
        $this->createPermission('user.ban', 'Is able to update users.');

        $this->createPermission('role.create', 'Is able to create roles.');
        $this->createPermission('role.update', 'Is able to update roles.');
        $this->createPermission('role.delete', 'Is able to delete roles.');

        $this->createPermission('news.create', 'Is able to create news.');
        $this->createPermission('news.update', 'Is able to update news.');
        $this->createPermission('news.delete', 'Is able to delete news.');

        $this->createPermission('category.create', 'Is able to create a forum category.');
        $this->createPermission('category.update', 'Is able to create a forum category.');
        $this->createPermission('category.delete', 'Is able to create a forum category.');

        $this->createPermission('forum.create', 'Is able to create a forum.');
        $this->createPermission('forum.update', 'Is able to create a forum.');
        $this->createPermission('forum.delete', 'Is able to create a forum.');

        $this->createPermission('admin.access', 'Is able to access the admin interface');
    }

    private function createPermission($slug, $description)
    {
        \App\Permission::create([
            'slug' => $slug,
            'description' => $description
        ]);
    }
}
