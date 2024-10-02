<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class transactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transactions')->insert([
            'parking_id'        => 'P0001',
            'amount'            => '15000',
            'transaction_type'  => 'Cash',
            'status'            => 'Completed',
            'transaction_at'    => '2024-10-01 12:10',
            'paid_at'           => '2024-10-01 12:15',
            'duration'          => '60',
        ]);
        DB::table('transactions')->insert([
            'parking_id'        => 'P0002',
            'amount'            => '10000',
            'transaction_type'  => 'E-Money',
            'status'            => 'Completed',
            'transaction_at'    => '2024-10-01 17:13',
            'paid_at'           => '2024-10-01 17:18',
            'duration'          => '45'
        ]);
        DB::table('transactions')->insert([
            'parking_id'        => 'P0003',
            'amount'            => '5000',
            'transaction_type'  => 'cash',
            'status'            => 'Completed',
            'transaction_at'    => '2024-10-01 22:29',
            'paid_at'           => '2024-10-01 22:34',
            'duration'          => '20'
        ]);
        DB::table('transactions')->insert([
            'parking_id'        => 'P0004',
            'amount'            => '15000',
            'transaction_type'  => 'E-Money',
            'status'            => 'Completed',
            'transaction_at'    => '2024-10-02 11:05',
            'paid_at'           => '2024-10-02 11:10',
            'duration'          => '60'
        ]);
        DB::table('transactions')->insert([
            'parking_id'        => 'P0005',
            'amount'            => '10000',
            'transaction_type'  => 'Cash',
            'status'            => 'Completed',
            'transaction_at'    => '2024-10-02 19:13',
            'paid_at'           => '2024-10-02 19:18',
            'duration'          => '40'
        ]);
    }
}