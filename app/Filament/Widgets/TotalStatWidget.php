<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Card;

class TotalStatWidget extends BaseWidget
{
    protected function getStats(): array
    {
        // Fetch the total number of vehicles and total payments
        $totalVehicle = DB::table('vehicles')->count();
        $totalPayment = DB::table('payments')->count();

        return [
            // Total Vehicle Card
            Card::make('Total Vehicle', $totalVehicle)
                ->description('Jumlah Kendaraan')
                ->descriptionIcon('heroicon-s-academic-cap')
                ->color('success'),

            // Total Payment Card
            Card::make('Total Payment', $totalPayment)
                ->description('Jumlah Payment yang terjadi')
                ->descriptionIcon('heroicon-s-academic-cap')
                ->color('success'),
        ];
    }
}
