<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Card;

class TotalPaymentStatWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalPayment = DB::table('payments')->count();
        return [
            Card::make('Total Payment', $totalPayment)
            ->description('Jumlah Payment yang terjadi')
            ->descriptionIcon('heroicon-s-academic-cap')
            ->color('success'),
        ];
    }
}
