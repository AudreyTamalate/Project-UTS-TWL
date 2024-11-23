<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehicleResource\Pages;
use App\Filament\Resources\VehicleResource\RelationManagers;
use App\Models\Vehicle;
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
use App\Imports\vehicleImport;

class VehicleResource extends Resource
{
    protected static ?string $model = Vehicle::class;

    protected static ?string $navigationLabel = 'Daftar Vehicle';
    protected static ?string $navigationGroup = 'Data Vehicle';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('vehicle_id')
                ->label('Vehicle ID')
                ->required()
                ->maxLength(5),
                Forms\Components\Select::make('vehicle_type')
                ->options([
                'Roda 2' => 'Roda 2',
                'Roda 4' => 'Roda 4',
                ])
                ->searchable()
                ->native(false),
                Forms\Components\TextInput::make('plate_number')
                ->label('Plate Number')
                ->required()
                ->maxLength(20),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('vehicle_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('vehicle_type')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('plate_number')->sortable()->searchable(),
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
               Excel::import(new vehicleImport, $filePath);
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
                ->modalHeading('Import Data Vehicle')
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
            'index' => Pages\ListVehicles::route('/'),
            'create' => Pages\CreateVehicle::route('/create'),
            'edit' => Pages\EditVehicle::route('/{record}/edit'),
        ];
    }
}