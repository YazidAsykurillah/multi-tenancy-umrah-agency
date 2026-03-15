<?php

namespace App\Filament\Resources\System\GlobalUsers\Pages;

use App\Filament\Resources\System\GlobalUsers\GlobalUserResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = GlobalUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
