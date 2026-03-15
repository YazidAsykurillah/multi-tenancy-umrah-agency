<?php

namespace App\Filament\Resources\Tenant\Departures\Pages;

use App\Filament\Resources\Tenant\Departures\DepartureResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDeparture extends EditRecord
{
    protected static string $resource = DepartureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
