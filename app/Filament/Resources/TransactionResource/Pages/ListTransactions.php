<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(), // Button to create a new transaction
            Actions\Action::make('cetak_laporan')
                ->label('Cetak Laporan')
                ->icon('heroicon-o-printer')
                ->action(fn() => $this->cetakLaporan()) // Method cetakLaporan
                ->requiresConfirmation()
                ->modalHeading('Cetak Laporan Aktifitas')
                ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
        ];
    }

    public function cetakLaporan()
    {
        $data = \DB::select('SELECT 
            V.vehicle_type,
            V.plate_number,
            P.check_in_at,
            T.transaction_at,
            T.amount AS transaction_amount,
            T.status AS transaction_status,
            PM.amount AS payment_amount,
            PM.status AS payment_status
        FROM vehicles V
        INNER JOIN parkings P ON V.vehicle_id = P.vehicle_id
        INNER JOIN transactions T ON P.parking_id = T.parking_id
        LEFT JOIN payments PM ON T.transaction_id = PM.transaction_id
        ORDER BY T.transaction_at DESC
        LIMIT 100');

    $pdf = \PDF::loadView('laporan.activity_report', ['data' => $data]);
    return response()->streamDownload(fn() => print($pdf->output()), 'laporan_aktifitas_kendaraan.pdf');
}
}
