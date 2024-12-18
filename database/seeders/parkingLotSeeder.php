<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class parkingLotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parking_lots')->insert([
            'parking_lot_id'    => 'PL001',
            'capacity'          => '50',
            'latitude'          => '1.234567',
            'longitude'         => '103.456789',
        ]);

        DB::table('parking_lots')->insert([
            'parking_lot_id'    => 'PL002',
            'capacity'          => '40',
            'latitude'          => '1.345678',
            'longitude'         => '103.567890',
        ]);

        DB::table('parking_lots')->insert([
            'parking_lot_id'    => 'PL003',
            'capacity'          => '45',
            'latitude'          => '1.456789',
            'longitude'         => '103.678901',
        ]);

        DB::table('parking_lots')->insert([
            'parking_lot_id'    => 'PL004',
            'capacity'          => '55',
            'latitude'          => '1.567890',
            'longitude'         => '103.789012',
        ]);

        DB::table('parking_lots')->insert([
            'parking_lot_id'    => 'PL005',
            'capacity'          => '60',
            'latitude'          => '1.678901',
            'longitude'         => '103.890123',
        ]);
    }
}