<?php

namespace App\Imports;

use App\Models\paymentable;
use Maatwebsite\Excel\Concerns\ToModel;

class paymentableImport implements ToModel
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
        return new paymentable([
            'paymentable_id' => $row['0'],
        ]);}
    }
}
