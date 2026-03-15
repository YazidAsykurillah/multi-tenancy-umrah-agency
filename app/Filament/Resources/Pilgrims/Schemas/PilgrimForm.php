<?php

namespace App\Filament\Resources\Pilgrims\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PilgrimForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('nik')
                    ->label('National ID (NIK)')
                    ->maxLength(255),
                TextInput::make('passport_number')
                    ->maxLength(255),
                TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                DatePicker::make('birth_date'),
                Textarea::make('address')
                    ->columnSpanFull(),
                Select::make('departure_id')
                    ->relationship('departure', 'departure_date')
                    ->label('Departure Date'),
                Select::make('status')
                    ->options([
                        'prospect' => 'Prospect',
                        'deposit_paid' => 'Deposit Paid',
                        'fully_paid' => 'Fully Paid',
                        'document_processing' => 'Document Processing',
                        'visa_approved' => 'Visa Approved',
                        'ready_to_depart' => 'Ready to Depart',
                    ])
                    ->required()
                    ->default('prospect'),
            ]);
    }
}
