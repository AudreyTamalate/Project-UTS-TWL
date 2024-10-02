<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class vehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehicles')->insert([
            'vehicle_type' => 'Roda 2',
            'plate_number' => 'BK 1234 ANC',
        ]);
        DB::table('vehicles')->insert([
            'vehicle_type' => 'Roda 4',
            'plate_number' => 'BK 1231 BGD',
        ]);
        DB::table('vehicles')->insert([
            'vehicle_type' => 'Roda 2',
            'plate_number' => 'BK 1256 CDA',
        ]);
        DB::table('vehicles')->insert([
            'vehicle_type' => 'Roda 4',
            'plate_number' => 'BK 2340 JDI',
        ]);
        DB::table('vehicles')->insert([
            'vehicle_type' => 'Roda 2',
            'plate_number' => 'BK 3421 ABC',
        ]);
    }
}