<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use App\Models\Parking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('transaction_id')
                ->label('Transaction ID')
                ->required()
                ->maxLength(5),
                Forms\Components\Select::make('parking_id')
                ->label('Parking ID')
                ->options(Parking::all()->pluck('parking_id','id'))
                ->searchable(),
                Forms\Components\TextInput::make('amount')
                ->label('Amount')
                ->required(),
                Forms\Components\Select::make('transaction_type')
                ->options([
                'Application' => 'Application',
                'E-Money' => 'E-Money',
                ])
                ->searchable()
                ->native(false),
                Forms\Components\Select::make('status')
                ->options([
                'Completed' => 'Completed',
                'On Hold' => 'On Hold',
                'Failed' => 'Failed',
                ])
                ->searchable()
                ->native(false),
                Forms\Components\DateTimePicker::make('transaction_at')
                ->label('Transaction At')
                ->required(),
                Forms\Components\DateTimePicker::make('paid_at')
                ->label('Paid At')
                ->required(),
                Forms\Components\TextInput::make('duration')
                ->label('Duration')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('transaction_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('parking_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('amount')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('transaction_type')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('status')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('transaction_at')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('paid_at')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('duration')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}