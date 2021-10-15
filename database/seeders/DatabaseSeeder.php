<?php

namespace Database\Seeders;

use App\Models\EvacuationCenters;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(BrgyOfficialSeeder::class);
        $this->call(LGUSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EvacuationCenterSeeder::class);
        $this->call(ReportSeeder::class);
    }
}
