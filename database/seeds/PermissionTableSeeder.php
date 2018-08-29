<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(array('name' => 'view_viewers'));
        Permission::create(array('name' => 'add_viewers'));
        Permission::create(array('name' => 'edit_viewers'));
        Permission::create(array('name' => 'delete_viewers'));

        Permission::create(array('name' => 'view_managers'));
        Permission::create(array('name' => 'add_managers'));
        Permission::create(array('name' => 'edit_managers'));
        Permission::create(array('name' => 'delete_managers'));

        Permission::create(array('name' => 'view_admins'));
        Permission::create(array('name' => 'add_admins'));
        Permission::create(array('name' => 'edit_admins'));
        Permission::create(array('name' => 'delete_admins'));
    }
}
