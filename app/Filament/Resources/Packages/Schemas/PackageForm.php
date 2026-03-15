<?php

namespace App\Filament\Resources\Packages\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('IDR'),
                TextInput::make('duration_days')
                    ->label('Duration (Days)')
                    ->required()
                    ->numeric(),
                TextInput::make('airline')
                    ->maxLength(255),
                TextInput::make('hotel')
                    ->maxLength(255),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
