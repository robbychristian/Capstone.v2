<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BrgyOfficialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brgy_officials')->insert([
            'email' => 'barangay@kabisig.com',
            'name' => 'Sirjean Nunez',
            'password' => Hash::make('official'),
            'user_role' => 3,
            'brgy_position' => 'Kagawad',
            'brgy_loc' => 'Barangay Santolan',
            'profile_pic' => 'noimage.jpg',
            'contact_no' => '09123456789'
        ]);
    }
}
