<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Vehicle;

class VehicleTableStatWidget extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                vehicle::query()
                ->limit (5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('vehicle_type')
                    ->label('Tipe Kendaraan')
                    ->sortable(),
                    Tables\Columns\TextColumn::make('plate_number')
                    ->label('Plat Kendaraan')
                    ->sortable(),
            ]);
    }
}
