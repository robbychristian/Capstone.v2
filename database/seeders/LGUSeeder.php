<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LGUSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('local_units')->insert([
            'email' => 'lgu@kabisig.com',
            'password' => Hash::make('PasigCity'),
            'user_role' => 5
        ]);
    }
}
