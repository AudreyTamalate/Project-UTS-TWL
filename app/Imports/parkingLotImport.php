<?php

namespace App\Imports;

use App\Models\parkingLot;
use Maatwebsite\Excel\Concerns\ToModel;

class parkingLotImport implements ToModel
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
        return new parkingLot([
            'parking_lot_id' => $row['0'],
            'capacity' => $row['1'],
            'latitude' => $row['2'],
            'longitude' => $row['3'],
        ]);}
    }
}