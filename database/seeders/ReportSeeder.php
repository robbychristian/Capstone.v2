<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reports')->insert([
            'user_id' => '1',
            'full_name' => 'Juan Dela Cruz',
            'title' => 'Live wire',
            'description' => 'There is a live wire in this area',
            'brgy_loc' => 'Barangay Santolan',
            'status' => 'not confirmed',
            'loc_lat' => '14.65132',
            'loc_lng' => '16.65132',
            'loc_img' => 'risk_img.jpg',
        ]);
        DB::table('reports')->insert([
            'user_id' => '2',
            'full_name' => 'Juan G',
            'title' => 'Live stream',
            'description' => 'There is a live stream in this area',
            'brgy_loc' => 'Barangay Dela Paz',
            'status' => 'not confirmed',
            'loc_lat' => '14.65132',
            'loc_lng' => '16.65132',
            'loc_img' => 'risk_img.jpg',
        ]);
    }
}
