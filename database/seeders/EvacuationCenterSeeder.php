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
        //BARANGAY SANTOLAN 5
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

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Santolan',
            'lat' => '14.6213444',
            'lng' => ' 121.0829739'
        ]);


        //BARANGAY DELA PAZ 4

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

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Dela Paz',
            'lat' => '14.6147514',
            'lng' => '121.0953941'
        ]);

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Dela Paz',
            'lat' => '14.61432',
            'lng' => '121.09517'
        ]);


        //BARANGAY MANGGAHAN 4

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


        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Manggahan',
            'lat' => '14.595450',
            'lng' => '121.095660'
        ]);

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Manggahan',
            'lat' => '14.609',
            'lng' => '121.10674'
        ]);


        //BARANGAY MAYBUNGA 4

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

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Maybunga',
            'lat' => '14.577324',
            'lng' => '121.081957'
        ]);

        //BARANGAY ROSARIO 4

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

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Rosario',
            'lat' => '  14.58628',
            'lng' => '121.08437 '
        ]);

        DB::table('evacuation_centers')->insert([
            'brgy_loc' => 'Barangay Rosario',
            'lat' => '14.58862',
            'lng' => '121.08864'
        ]);
    }
}
