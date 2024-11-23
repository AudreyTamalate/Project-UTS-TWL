<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\Payment;

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
                ->modalHeading('Cetak Laporan Transaksi')
                ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
        ];
    }

    public function cetakLaporan()
    {
        $data = \DB::select('SELECT T.transaction_type, T.transaction_at, P.amount, P.status
                             FROM transactions T
                             INNER JOIN payments P ON T.id = P.transaction_id
                             LIMIT 100');

        // Check if $data has content (for debugging)

        $pdf = \PDF::loadView('laporan.transaction_payment', ['data' => $data]);
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan_transaksi.pdf');
    }
}
