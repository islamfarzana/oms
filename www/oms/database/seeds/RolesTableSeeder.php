<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();   //remove if role records exiest

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'sub-admin']);
        Role::create(['name' => 'employee']);
    }
}
