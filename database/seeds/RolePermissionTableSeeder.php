<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::find(1);
        $role->permissions()->attach([1,2,3,4,5,6,7,8,9,10,11,12]);
        
        $role = Role::find(2);
        $role->permissions()->attach([1,2,3,4,5,6,7,8]);

        $role = Role::find(3);
        $role->permissions()->attach([1,2,3,4]);
    }
}
