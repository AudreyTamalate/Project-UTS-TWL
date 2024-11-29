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
    // SQL query to fetch all transactions and total revenue per day
        $data = \DB::select('SELECT 
            DATE(T.transaction_at) AS transaction_date,  -- Group by date
            V.vehicle_type,
            V.plate_number,
            T.amount,
            T.status
        FROM transactions T
        INNER JOIN parkings P ON T.parking_id = P.parking_id
        INNER JOIN vehicles V ON P.vehicle_id = V.vehicle_id
        INNER JOIN parking_fees PF ON PF.vehicle_type = V.vehicle_type
        ORDER BY transaction_date DESC, T.transaction_at DESC');  // Order by date and time for transactions

    // Calculate total revenue per day
        $totalsPerDay = \DB::select('SELECT 
            DATE(T.transaction_at) AS transaction_date,  
            SUM(T.amount) AS total_revenue
        FROM transactions T
        INNER JOIN parkings P ON T.parking_id = P.parking_id
        INNER JOIN vehicles V ON P.vehicle_id = V.vehicle_id
        INNER JOIN parking_fees PF ON PF.vehicle_type = V.vehicle_type
        GROUP BY transaction_date
        ORDER BY transaction_date DESC');  // Group by date and sum the amounts

    // Generate the PDF with the data and totals
        $pdf = \PDF::loadView('laporan.vehicle_financial_report', [
            'data' => $data,
            'totalsPerDay' => $totalsPerDay
        ]);

        return response()->streamDownload(fn() => print($pdf->output()), 'laporan_keuangan_per_hari.pdf');
    }
}