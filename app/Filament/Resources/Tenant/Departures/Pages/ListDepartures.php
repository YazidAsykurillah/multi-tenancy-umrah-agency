<?php

namespace App\Filament\Resources\Tenant\Departures\Pages;

use App\Filament\Resources\Tenant\Departures\DepartureResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDepartures extends ListRecords
{
    protected static string $resource = DepartureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
