<?php

namespace App\Filament\Resources\PaymentableResource\Pages;

use App\Filament\Resources\PaymentableResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaymentables extends ListRecords
{
    protected static string $resource = PaymentableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
