<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();   //remove if user records exiest
        DB::table('role_user')->truncate();

        User::create(['employee_id' => '1','email' => 'admin@gmail.com', 'password' => Hash::make('admin123')]);
        User::create(['employee_id' => '2','email' => 'bella@gmail.com', 'password' => Hash::make('bella123')]);
        User::create(['employee_id' => '3','email' => 'della@gmail.com', 'password' => Hash::make('della123')]);
        User::create(['employee_id' => '4','email' => 'stella@gmail.com', 'password' => Hash::make('stella123')]);
        User::create(['employee_id' => '5','email' => 'aaley@gmail.com', 'password' => Hash::make('aaley123')]);
        User::create(['employee_id' => '6','email' => 'dally@gmail.com', 'password' => Hash::make('dally123')]);
        


    }
}
