<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParkingResource\Pages;
use App\Filament\Resources\ParkingResource\RelationManagers;
use App\Models\Parking;
use App\Models\Vehicle;
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
use App\Imports\parkingImport;


class ParkingResource extends Resource
{
    protected static ?string $model = Parking::class;

    protected static ?string $navigationLabel = 'Daftar Parking';
    protected static ?string $navigationGroup = 'Data Parkir';

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('parking_id')
                ->label('Parking ID')
                ->required()
                ->maxLength(5),
                Forms\Components\Select::make('vehicle_id')
                ->label('Vehicle ID')
                ->options(Vehicle::all()->pluck('vehicle_id','id'))
                ->searchable(),
                Forms\Components\Select::make('parking_lot_id')
                ->label('Parking Lot ID')
                ->options(ParkingLot::all()->pluck('parking_lot_id','id'))
                ->searchable(),
                Forms\Components\DateTimePicker::make('check_in_at')
                ->label('Check In At')
                ->required(),
                Forms\Components\Select::make('status')
                ->options([
                'Completed' => 'Completed',
                'On Hold' => 'On Hold',
                'Fail' => 'Fail',
                ])
                ->searchable()
                ->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('parking_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('vehicle_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('parking_lot_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('check_in_at')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('status')->sortable()->searchable(),
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
               Excel::import(new parkingImport, $filePath);
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
                ->modalHeading('Import Data Parking ')
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
            'index' => Pages\ListParkings::route('/'),
            'create' => Pages\CreateParking::route('/create'),
            'edit' => Pages\EditParking::route('/{record}/edit'),
        ];
    }
}