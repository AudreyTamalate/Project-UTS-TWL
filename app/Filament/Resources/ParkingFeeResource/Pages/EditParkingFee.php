<?php

namespace App\Filament\Resources\ParkingFeeResource\Pages;

use App\Filament\Resources\ParkingFeeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditParkingFee extends EditRecord
{
    protected static string $resource = ParkingFeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
