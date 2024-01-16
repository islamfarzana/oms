<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(DesignationsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(AttendancesTableSeeder::class);
        $this->call(BasicSalariesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
    }
}
