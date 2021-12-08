<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangays')->insert([
            'brgy_loc' => 'Barangay Santolan',
            'brgy_lng' => '121.0880',
            'brgy_lat' => '14.6131'
        ]);
        DB::table('barangays')->insert([
            'brgy_loc' => 'Barangay Dela Paz',
            'brgy_lng' => '121.0960',
            'brgy_lat' => '14.6137'
        ]);
        DB::table('barangays')->insert([
            'brgy_loc' => 'Barangay Manggahan',
            'brgy_lng' => '121.093698',
            'brgy_lat' => '14.601887'
        ]);
        DB::table('barangays')->insert([
            'brgy_loc' => 'Barangay Maybunga',
            'brgy_lng' => '121.0850',
            'brgy_lat' => '14.5763'
        ]);
        DB::table('barangays')->insert([
            'brgy_loc' => 'Barangay Rosario',
            'brgy_lng' => '121.0891',
            'brgy_lat' => '14.5885'
        ]);
    }
}
