<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\transaction;

class StatusTransaksiChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Status Transaksi';

    protected function getData(): array
    {
        $transaction = transaction::query()->limit(7);
        $statustransaction=[];
        foreach ($transaction as $row){
            $statustransaction []= $row->statusTransaction;
        }
        return [
            'datasets' => [
            [
                'label' => 'Status Transaksi',
                'data' => [1, 2, 3, 4],
                'backgroundColor' => ['#f87171', '#fbbf24', '#34d399', '#60a5fa']
            ]
            ],
            'labels' =>['On Hold', 'Completed', 'Failed']
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
