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
        DB::table('evacuation_centers')->insert([
            'lat' => '14.612163189054954',
            'lng' => '121.09191240222641'
        ]);

        DB::table('evacuation_centers')->insert([
            'lat' => '14.61561537382943',
            'lng' => '121.08202130848416'
        ]);

        DB::table('evacuation_centers')->insert([
            'lat' => '14.616839189248806',
            'lng' => '121.08160482875117'
        ]);

        DB::table('evacuation_centers')->insert([
            'lat' => '14.616544695649692',
            'lng' => '121.08636442213766'
        ]);
    }
}
