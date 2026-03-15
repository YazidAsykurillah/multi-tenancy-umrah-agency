<?php

namespace App\Filament\Resources\Tenant\Pilgrims\Pages;

use App\Filament\Resources\Tenant\Pilgrims\PilgrimResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePilgrims extends ManageRecords
{
    protected static string $resource = PilgrimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
