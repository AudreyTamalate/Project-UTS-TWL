<?php

namespace App\Filament\Resources\ParkingFeeResource\Pages;

use App\Filament\Resources\ParkingFeeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;


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
                ->modalHeading('Cetak Laporan Keuangan')
                ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
        ];
    }

    public function cetakLaporan()
    {
        // SQL query to fetch parking fee and parking lot details
        $data = \DB::select('SELECT 
            V.vehicle_type,
            V.plate_number,
            PF.initial_entry_amount,
            PF.increment,
            PF.max_flat_amount,
            T.amount,
            T.status
        FROM vehicles V
        INNER JOIN parkings P ON V.vehicle_id = P.vehicle_id
        INNER JOIN transactions T ON P.parking_id = T.parking_id
        INNER JOIN parking_fees PF ON PF.vehicle_type = V.vehicle_type
        LIMIT 100');

    $pdf = \PDF::loadView('laporan.vehicle_financial_report', ['data' => $data]);
    return response()->streamDownload(fn() => print($pdf->output()), 'laporan_keuangan_kendaraan.pdf');
    }
}
