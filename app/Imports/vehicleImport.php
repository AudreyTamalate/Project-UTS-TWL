<?php

namespace App\Imports;

use App\Models\vehicle;
use Maatwebsite\Excel\Concerns\ToModel;

class vehicleImport implements ToModel
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
        return new vehicle([
            'vehicle_id' => $row['0'],
            'vehicle_type' => $row['1'],
            'plate_number' => $row['2'],
        ]);}
    }
}