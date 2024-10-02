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

class PaymentableResource extends Resource
{
    protected static ?string $model = Paymentable::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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