<?php

namespace App\Filament\Resources\Tenant\Departures\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DepartureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('package_id')
                    ->relationship('package', 'name')
                    ->required(),
                DatePicker::make('departure_date')
                    ->required(),
                DatePicker::make('return_date')
                    ->required(),
                TextInput::make('quota')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options([
                        'planned' => 'Planned',
                        'open' => 'Open',
                        'full' => 'Full',
                        'closed' => 'Closed',
                    ])
                    ->required()
                    ->default('planned'),
            ]);
    }
}
