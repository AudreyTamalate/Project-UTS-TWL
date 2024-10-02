<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class paymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([
            'transaction_id'    => 'T0001',
            'payment_id'        => 'P0001',
            'amount'            => '15000',
            'status'            => 'Completed',
        ]);

        DB::table('payments')->insert([
            'transaction_id'    => 'T0002',
            'payment_id'        => 'P0002',
            'amount'            => '20000',
            'status'            => 'Completed',
        ]);

        DB::table('payments')->insert([
            'transaction_id'    => 'T0003',
            'payment_id'        => 'P0003',
            'amount'            => '10000',
            'status'            => 'Completed',
        ]);

        DB::table('payments')->insert([
            'transaction_id'    => 'T0004',
            'payment_id'        => 'P0004',
            'amount'            => '15000',
            'status'            => 'Completed',
        ]);

        DB::table('payments')->insert([
            'transaction_id'    => 'T0005',
            'payment_id'        => 'P0005',
            'amount'            => '5000',
            'status'            => 'Completed',
        ]);
    }
}