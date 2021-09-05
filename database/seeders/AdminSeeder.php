<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'patahi@admin.com',
            'password' => \Hash::make('123123123'),
            'userType' => 0,
            'address' => 'Davao City',
            'isActivated' => 1,
            'phone' => '09091234567',
            'created_at' => Carbon::now()
        ]);
    }
}
