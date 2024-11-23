<?php

namespace App\Filament\Resources\VehicleResource\Pages;

use App\Filament\Resources\VehicleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\Vehicle;


class ListVehicles extends ListRecords
{
    protected static string $resource = VehicleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(), // Tombol untuk create
            Actions\Action::make('cetak_laporan')
                ->label('Cetak Laporan')
                ->icon('heroicon-o-printer')
                ->action(fn() => $this->cetakLaporan()) // Method cetakLaporan
                ->requiresConfirmation()
                ->modalHeading('Cetak Laporan Kendaraan')
                ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
        ];
    }
    public function cetakLaporan()
    {
        $data = \DB::select('SELECT V.vehicle_type, V.plate_number, P.status 
                         FROM vehicles V 
                         INNER JOIN parkings P ON V.vehicle_id = P.vehicle_id 
                         LIMIT 100');

    // Check if $data has content
     // Log data for debugging

    $pdf = \PDF::loadView('laporan.vehicle_parking', ['data' => $data]);
    return response()->streamDownload(fn() => print($pdf->output()), 'laporan_kendaraan.pdf');
    }
}
