<?php

namespace App\Filament\Resources\Tenant\Pilgrims\Pages;

use App\Filament\Resources\Tenant\Pilgrims\PilgrimResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPilgrim extends EditRecord
{
    protected static string $resource = PilgrimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
