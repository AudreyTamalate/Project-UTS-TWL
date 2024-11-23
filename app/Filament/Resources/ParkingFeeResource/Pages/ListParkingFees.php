<?php

namespace App\Filament\Resources\ParkingFeeResource\Pages;

use App\Filament\Resources\ParkingFeeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\ParkingLot;

class ListParkingFees extends ListRecords
{
    protected static string $resource = ParkingFeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(), // Button to create a new parking fee
            Actions\Action::make('cetak_laporan')
                ->label('Cetak Laporan')
                ->icon('heroicon-o-printer')
                ->action(fn() => $this->cetakLaporan()) // Method cetakLaporan
                ->requiresConfirmation()
                ->modalHeading('Cetak Laporan Parkir')
                ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
        ];
    }

    public function cetakLaporan()
    {
        // SQL query to fetch parking fee and parking lot details
        $data = DB::select('SELECT PF.amount AS fee_amount, PF.status AS fee_status, PL.capacity, PL.latitude, PL.longitude
            FROM parking_fees PF
            INNER JOIN parking_lots PL ON PF.parking_lot_id = PL.id
            LIMIT 100
        ');

        // Log data for debugging (optional)
        // \Log::info($data);

        // Load the data into the PDF
        $pdf = \PDF::loadView('laporan.parking_fee', ['data' => $data]);
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan_parkir.pdf');
    }
}
