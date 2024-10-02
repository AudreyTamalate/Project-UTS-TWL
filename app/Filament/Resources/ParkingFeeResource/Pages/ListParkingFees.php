<?php

namespace App\Filament\Resources\ParkingFeeResource\Pages;

use App\Filament\Resources\ParkingFeeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListParkingFees extends ListRecords
{
    protected static string $resource = ParkingFeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
