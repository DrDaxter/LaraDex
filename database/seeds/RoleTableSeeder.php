<?php

use Illuminate\Database\Seeder;
use LaraDex\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->role = "admin";
        $role->save();

        $role = new Role();
        $role->role = "user";
        $role->save();
    }
}
