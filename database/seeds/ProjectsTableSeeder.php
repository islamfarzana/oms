<?php

use App\Project;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::truncate();   //remove if role records exiest

        Project::create(['name' => 'Ecommerce One', 'description' => 'Ecommerce One is an online grocory shop', 'date_assigned' => '2020-04-01', 'deadline' => '2020-08-31', 'company' => 'Ecommerce One LTD','status' => 'Completed']);
        Project::create(['name' => 'Ekhanei.com', 'description' => 'Ekhanei.com is an online grocory shop', 'date_assigned' => '2020-09-15', 'deadline' => '2021-01-29', 'company' => 'Ekhanei.com ltd','status' => 'Pending']);
        Project::create(['name' => 'Student Management System', 'description' => 'Is a project to manage students of an university', 'date_assigned' => '2020-06-01', 'deadline' => '2020-09-01', 'company' => 'IUBAT','status' => 'Pending']);
        Project::create(['name' => "Let's Learn", 'description' => "It's a learning website link udemy", 'date_assigned' => '2020-08-01', 'deadline' => '2020-12-31', 'company' => "Let's Learn Ltd",'status' => 'Canceled']);
    }
}
