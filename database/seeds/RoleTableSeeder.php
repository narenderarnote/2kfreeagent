<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $role_employee = new Role();
	    $role_employee->name = 'admin';
	    $role_employee->description = 'A admin User';
	    $role_employee->save();

	    $role_manager = new Role();
	    $role_manager->name = 'player';
	    $role_manager->description = 'A player User';
	    $role_manager->save();
       
    }
}