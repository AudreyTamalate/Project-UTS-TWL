<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentableResource\Pages;
use App\Filament\Resources\PaymentableResource\RelationManagers;
use App\Models\Paymentable;
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
use App\Imports\paymentableImport;

class PaymentableResource extends Resource
{
    protected static ?string $model = Paymentable::class;

    protected static ?string $navigationLabel = 'Daftar Paymentable';
    protected static ?string $navigationGroup = 'Data Pembayaran';
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('paymentable_id')
                ->label('Paymentable ID')
                ->required()
                ->maxLength(5),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('paymentable_id')->sortable()->searchable(),
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
               Excel::import(new paymentableImport, $filePath);
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
                ->modalHeading('Import Data Transaction')
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
            'index' => Pages\ListPaymentables::route('/'),
            'create' => Pages\CreatePaymentable::route('/create'),
            'edit' => Pages\EditPaymentable::route('/{record}/edit'),
        ];
    }
}