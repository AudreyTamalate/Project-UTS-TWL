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
            'transaction_id'    => 'TR001',
            'parking_id'        => 'PK001',
            'amount'            => '15000',
            'transaction_type'  => 'Application',
            'status'            => 'On Hold',
            'transaction_at'    => '2024-10-01 12:10',
            'paid_at'           => '2024-10-01 12:15',
            'duration'          => '60',
        ]);
        DB::table('transactions')->insert([
            'transaction_id'    => 'TR002',
            'parking_id'        => 'PK002',
            'amount'            => '10000',
            'transaction_type'  => 'E-Money',
            'status'            => 'Completed',
            'transaction_at'    => '2024-10-01 17:13',
            'paid_at'           => '2024-10-01 17:18',
            'duration'          => '45'
        ]);
        DB::table('transactions')->insert([
            'transaction_id'    => 'TR003',
            'parking_id'        => 'PK003',
            'amount'            => '5000',
            'transaction_type'  => 'Application',
            'status'            => 'Completed',
            'transaction_at'    => '2024-10-01 22:29',
            'paid_at'           => '2024-10-01 22:34',
            'duration'          => '20'
        ]);
        DB::table('transactions')->insert([
            'transaction_id'    => 'TR004',
            'parking_id'        => 'PK004',
            'amount'            => '15000',
            'transaction_type'  => 'E-Money',
            'status'            => 'Failed',
            'transaction_at'    => '2024-10-02 11:05',
            'paid_at'           => '2024-10-02 11:10',
            'duration'          => '60'
        ]);
        DB::table('transactions')->insert([
            'transaction_id'    => 'TR005',
            'parking_id'        => 'PK005',
            'amount'            => '10000',
            'transaction_type'  => 'E-Money',
            'status'            => 'On Hold',
            'transaction_at'    => '2024-10-02 19:13',
            'paid_at'           => '2024-10-02 19:18',
            'duration'          => '40'
        ]);
    }
}