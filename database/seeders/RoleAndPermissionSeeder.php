<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $normalUser = Role::create(['name' => 'NormalUser']);
        $super_admin = Role::create(['name' => 'SuperAdmin']);
        $editor = Role::create(['name' => 'Editor']);
        $dashboard = Permission::create(['name' => 'dashboard']);
        $post_list = Permission::create(['name' => 'postList']);
        $post_create = Permission::create(['name' => 'postCreate']);
        $post_show = Permission::create(['name' => 'postShow']);
        $post_edit = Permission::create(['name' => 'postEdit']);
        $post_update = Permission::create(['name' => 'postUpdate']);
        $post_delete = Permission::create(['name' => 'postDelete']);

        $super_admin->givePermissionTo([$dashboard, $post_list,$post_create,$post_show,$post_update,$post_edit,$post_delete]);
        $normalUser->givePermissionTo([$dashboard, $post_list,$post_create,$post_show,$post_edit,$post_delete]);
        $editor->givePermissionTo([$post_list, $post_create, $post_edit, $post_show]);
    }
}
