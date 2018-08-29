<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(array('name' => 'SUPER_ADMIN'));
        Role::create(array('name' => 'ADMIN'));
        Role::create(array('name' => 'MANAGER'));
        Role::create(array('name' => 'VIEWER'));
    }
}
