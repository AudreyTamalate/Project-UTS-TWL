<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class parkingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parkings')->insert([
            'parking_id'        => 'PK001',
            'vehicle_id'        => 'V0001',
            'parking_lot_id'    => 'PL001',
            'check_in_at'       => '2024-10-01 08:30',
            'status'            => 'Completed',
        ]);
        DB::table('parkings')->insert([
            'parking_id'        => 'PK002',
            'vehicle_id'        => 'V0002',
            'parking_lot_id'    => 'PL002',
            'check_in_at'       => '2024-10-01 13:40',
            'status'            => 'On Hold',
        ]);
        DB::table('parkings')->insert([
            'parking_id'        => 'PK003',
            'vehicle_id'        => 'V0003',
            'parking_lot_id'    => 'PL003',
            'check_in_at'       => '2024-10-01 22:10',
            'status'            => 'Completed',
        ]);
        DB::table('parkings')->insert([
            'parking_id'        => 'PK004',
            'vehicle_id'        => 'V0004',
            'parking_lot_id'    => 'PL004',
            'check_in_at'       => '2024-10-02 10:23',
            'status'            => 'Failed',
        ]);
        DB::table('parkings')->insert([
            'parking_id'        => 'PK005',
            'vehicle_id'        => 'V0005',
            'parking_lot_id'    => 'PL001',
            'check_in_at'       => '2024-10-02 18:30',
            'status'            => 'Completed',
        ]);
    }
}