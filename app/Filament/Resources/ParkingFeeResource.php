<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParkingFeeResource\Pages;
use App\Filament\Resources\ParkingFeeResource\RelationManagers;
use App\Models\ParkingFee;
use App\Models\ParkingLot;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use App\Imports\parkingFeeImport;

class ParkingFeeResource extends Resource
{
    protected static ?string $model = ParkingFee::class;

    protected static ?string $navigationLabel = 'Daftar Parking Fee';
    protected static ?string $navigationGroup = 'Data Pembayaran';

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('parking_fee_id')
                ->label('Parking Fee ID')
                ->required()
                ->maxLength(5),
                Forms\Components\Select::make('parking_lot_id')
                ->label('Parking Lot ID')
                ->options(ParkingLot::all()->pluck('parking_lot_id','id'))
                ->searchable(),
                Forms\Components\Select::make('vehicle_type')
                ->options([
                'Roda 2' => 'Roda 2',
                'Roda 4' => 'Roda 4',
                ])
                ->searchable()
                ->native(false),
                Forms\Components\TextInput::make('initial_entry_amount')
                ->label('Initial Entry Amount')
                ->required(),
                Forms\Components\TextInput::make('increment')
                ->label('Increment')
                ->required(),
                Forms\Components\TextInput::make('max_flat_amount')
                ->label('Max Flat Amount')
                ->required(),
                Forms\Components\TextInput::make('penalty_duration')
                ->label('Penalty Duration')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('parking_fee_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('parking_lot_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('vehicle_type')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('initial_entry_amount')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('increment')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('max_flat_amount')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('penalty_duration')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                Action::make('importExcel')
                ->label('Import Excel')
                ->action(function (array $data) {
                // Pastikan $data['file'] adalah jalur yang valid distorage
                $filePath = storage_path('app/public/' . $data['file']);
               
                // Import file menggunakan jalur absolut
               Excel::import(new parkingFeeImport, $filePath);
                // Tampilkan notifikasi sukses
               Notification::make()
                ->title('Data berhasil diimpor!')
                ->success()
                ->send();
                })
               ->form([
                FileUpload::make('file')
                    ->label('Pilih File Excel')
                    ->disk('public') // Pastikan disimpan di disk 'public'
                    ->directory('imports')
                    ->acceptedFileTypes(['application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'])
                    ->required(),
                ])
                ->modalHeading('Import Data Parking Lot')
                ->modalButton('Import')
                ->color('success'),
            ])
                ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ]),
            ]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListParkingFees::route('/'),
            'create' => Pages\CreateParkingFee::route('/create'),
            'edit' => Pages\EditParkingFee::route('/{record}/edit'),
        ];
    }
}