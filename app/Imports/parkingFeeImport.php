<?php

namespace App\Imports;

use App\Models\parkingFee;
use Maatwebsite\Excel\Concerns\ToModel;

class parkingFeeImport implements ToModel
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
        return new parkingFee([
            'parking_fee_id' => $row['0'],
            'parking_lot_id' => $row['1'],
            'vehicle_type' => $row['2'],
            'initial_entry_amount' => $row['3'],
            'increment' => $row['4'],
            'max_flat_amount' => $row['5'],
            'penalty_duration' => $row['6'],
        ]);}
    }
}
