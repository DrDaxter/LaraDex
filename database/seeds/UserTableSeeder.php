<?php

use Illuminate\Database\Seeder;
use LaraDex\User;
use LaraDex\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol_user = Role::where('role','user')->first();
        $rol_admin = Role::where('role','admin')->first();
        
        $user = new User();
        $user->name = 'user';
        $user->email = 'user@email.com';
        $user->password = bcrypt('memo12');
        $user->save();
        $user->roles()->attach($rol_user);

        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@email.com';
        $user->password = bcrypt('memo12');
        $user->save();
        $user->roles()->attach($rol_admin);
    }
}
