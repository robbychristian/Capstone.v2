<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Juan',
            'last_name' => 'Cruz',
            'brgy_loc' => 'Barangay Santolan',
            'email_verified_at' => '2021-09-01 05:33:27',
            'email' => 'testuser@kabisig.com',
            'password' => Hash::make('password'),
            'user_role' => 4,
            'is_blocked' => 0,
            'is_deactivated' => 0,
        ]);

        DB::table('user_profiles')->insert([
            'user_email' => 'testuser@kabisig.com',
            'middle_name' => 'Dela',
            'home_add' => 'Santolan Street',
            'birth_day' => '1/1/2021',
            'contact_no' => '09123456789',
            'profile_pic' => 'noimage_jpg',
        ]);
    }
}
