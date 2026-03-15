<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('pilgrim_id')
                    ->relationship('pilgrim', 'name')
                    ->required()
                    ->searchable(),
                TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->prefix('IDR'),
                DatePicker::make('payment_date')
                    ->required()
                    ->default(now()),
                Select::make('payment_method')
                    ->options([
                        'cash' => 'Cash',
                        'transfer' => 'Transfer',
                        'credit_card' => 'Credit Card',
                    ])
                    ->required(),
                Textarea::make('note')
                    ->columnSpanFull(),
            ]);
    }
}
