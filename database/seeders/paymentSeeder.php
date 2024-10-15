<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Paymentable; // Assuming you have a Paymentable model

class paymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([
            'payment_id'        => 'P0001',
            'transaction_id'    => 'TR001',
            'amount'            => '15000',
            'status'            => 'Completed',
        ]);

        DB::table('payments')->insert([
            'payment_id'        => 'P0002',
            'transaction_id'    => 'TR002',
            'amount'            => '20000',
            'status'            => 'Failed',
        ]);

        DB::table('payments')->insert([
            'payment_id'        => 'P0003',
            'transaction_id'    => 'TR003',
            'amount'            => '10000',
            'status'            => 'Completed',
        ]);

        DB::table('payments')->insert([
            'payment_id'        => 'P0004',
            'transaction_id'    => 'TR004',
            'amount'            => '15000',
            'status'            => 'Completed',
        ]);

        DB::table('payments')->insert([
            'payment_id'        => 'P0005',
            'transaction_id'    => 'TR005',
            'amount'            => '5000',
            'status'            => 'On Hold',
        ]);
    }
}
