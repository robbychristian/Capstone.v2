<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvacuationCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //BARANGAY SANTOLAN
        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Santolan',
            'lat' => '14.612163189054954',
            'lng' => '121.09191240222641'
        ]);

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Santolan',
            'lat' => '14.61561537382943',
            'lng' => '121.08202130848416'
        ]);

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Santolan',
            'lat' => '14.616839189248806',
            'lng' => '121.08160482875117'
        ]);

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Santolan',
            'lat' => '14.616544695649692',
            'lng' => '121.08636442213766'
        ]);

        //BARANGAY DELA PAZ

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Dela Paz',
            'lat' => '14.6130913',
            'lng' => '121.0959235 '
        ]);

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Dela Paz',
            'lat' => '14.6122946774',
            'lng' => '121.092296416'
        ]);


        //BARANGAY MANGGAHAN

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Manggahan',
            'lat' => '14.60049',
            'lng' => '121.10114'
        ]);

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Manggahan',
            'lat' => '14.6064674518',
            'lng' => '121.092152854'
        ]);

        //BARANGAY MAYBUNGA

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Maybunga',
            'lat' => '14.57721',
            'lng' => '121.09773'
        ]);

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Maybunga',
            'lat' => '14.5767617',
            'lng' => '121.0853177'
        ]);

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Maybunga',
            'lat' => '14.5784708',
            'lng' => '121.0862173'
        ]);

        //BARANGAY ROSARIO

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Rosario',
            'lat' => ' 14.58443',
            'lng' => '121.08457'
        ]);

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Rosario',
            'lat' => '14.590134',
            'lng' => '121.084774'
        ]);
    }
}
