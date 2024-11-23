<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Card;

class TotalVehicleStatWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalVehicle = DB::table('vehicles')->count();
        return [
            Card::make('Total Vehicle', $totalVehicle)
            ->description('Jumlah Kendaraan hari ini')
            ->descriptionIcon('heroicon-s-academic-cap')
            ->color('success'),
        ];
    }
}
