<?php

namespace App\Imports;

use App\Models\payment;
use Maatwebsite\Excel\Concerns\ToModel;

class paymentImport implements ToModel
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
        return new payment([
            'payment_id' => $row['0'],
            'transaction_id' => $row['1'],
            'amount' => $row['2'],
            'status' => $row['3'],
        ]);}
    }
}
