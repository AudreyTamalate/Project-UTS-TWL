<?php

namespace App\Imports;

use App\Models\parking;
use Maatwebsite\Excel\Concerns\ToModel;

class parkingImport implements ToModel
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
        return new parking([
            'parking_id' => $row['0'],
            'vehicle_id' => $row['1'],
            'parking_lot_id' => $row['2'],
            'check_in_at' => $row['3'],
            'status' => $row['4'],
        ]);}
    }
}