<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $role_admin = Role::where('name', 'admin')->first();
	    $role_player  = Role::where('name', 'player')->first();

	    $employee = new User();
	    $employee->name = 'Admin';
	    $employee->email = 'admin@example.com';
	    $employee->password = bcrypt('123');
	    $employee->save();
	    $employee->roles()->attach($role_admin);

	    $manager = new User();
	    $manager->name = 'player';
	    $manager->email = 'player@example.com';
	    $manager->password = bcrypt('123');
	    $manager->save();
	    $manager->roles()->attach($role_player);
    }
}
