<?php

namespace App\Imports;

use App\Models\transaction;
use Maatwebsite\Excel\Concerns\ToModel;

class transactionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $rowCount=0;
    public function model(array $row)
    {
        $this->rowCount++;
        if($this->rowCount>1 && isset($row[0])){
        return new transaction([
            'transaction_id' => $row['0'],
            'parking_id' => $row['1'],
            'amount' => $row['2'],
            'transaction_type' => $row['3'],
            'status' => $row['4'],
            'transaction_at' => $row['5'],
            'paid_at' => $row['6'],
            'duration' => $row['7'],
        ]);}
    }
}