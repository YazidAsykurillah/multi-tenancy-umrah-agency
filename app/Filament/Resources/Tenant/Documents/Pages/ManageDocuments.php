<?php

namespace App\Filament\Resources\Tenant\Documents\Pages;

use App\Filament\Resources\Tenant\Documents\DocumentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageDocuments extends ManageRecords
{
    protected static string $resource = DocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
