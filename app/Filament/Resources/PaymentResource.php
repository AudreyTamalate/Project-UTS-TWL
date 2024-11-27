<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use App\Models\Transaction;
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
use App\Imports\paymentImport;


class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationLabel = 'Daftar Payment';
    protected static ?string $navigationGroup = 'Data Pembayaran';
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('payment_id')
                ->label('Payment ID')
                ->required()
                ->maxLength(5),
                Forms\Components\Select::make('transaction_id')
                ->label('Transaction ID')
                ->options(Transaction::all()->pluck('transaction_id','id'))
                ->searchable(),
                Forms\Components\TextInput::make('amount')
                ->label('Amount')
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
                Tables\Columns\TextColumn::make('payment_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('transaction_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('amount')->sortable()->searchable(),
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
               Excel::import(new paymentImport, $filePath);
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}