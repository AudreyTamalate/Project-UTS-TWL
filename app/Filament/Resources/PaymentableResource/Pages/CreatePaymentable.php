<?php

namespace App\Filament\Resources\PaymentableResource\Pages;

use App\Filament\Resources\PaymentableResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePaymentable extends CreateRecord
{
    protected static string $resource = PaymentableResource::class;
}
