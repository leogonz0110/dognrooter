<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    
    }
}
