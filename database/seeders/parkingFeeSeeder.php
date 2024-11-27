<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class parkingFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parking_fees')->insert([
            'parking_fee_id'        => 'PF001',
            'parking_lot_id'        => 'PL001',
            'vehicle_type'          => 'Roda 2',
            'initial_entry_amount'  => '2000',
            'increment'             => '200',
            'max_flat_amount'       => '5000',
            'penalty_duration'      => '30',
        ]);
        DB::table('parking_fees')->insert([
            'parking_fee_id'        => 'PF002',
            'parking_lot_id'        => 'PL002',
            'vehicle_type'          => 'Roda 2',
            'initial_entry_amount'  => '2000',
            'increment'             => '200',
            'max_flat_amount'       => '5000',
            'penalty_duration'      => '60',
        ]);
        DB::table('parking_fees')->insert([
            'parking_fee_id'        => 'PF003',
            'parking_lot_id'        => 'PL003',
            'vehicle_type'          => 'Roda 4',
            'initial_entry_amount'  => '5000',
            'increment'             => '500',
            'max_flat_amount'       => '20000',
            'penalty_duration'      => '30',
        ]);
        DB::table('parking_fees')->insert([
            'parking_fee_id'        => 'PF004',
            'parking_lot_id'        => 'PL004',
            'vehicle_type'          => 'Roda 4',
            'initial_entry_amount'  => '5000',
            'increment'             => '500',
            'max_flat_amount'       => '20000',
            'penalty_duration'      => '60',
        ]);
        DB::table('parking_fees')->insert([
            'parking_fee_id'        => 'PF005',
            'parking_lot_id'        => 'PL005',
            'vehicle_type'          => 'Roda 4',
            'initial_entry_amount'  => '5000',
            'increment'             => '500',
            'max_flat_amount'       => '20000',
            'penalty_duration'      => '90',
        ]);
    }
}