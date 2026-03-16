<?php

namespace App\Filament\Resources\Manager\AgencyResource\Pages;

use App\Filament\Resources\Manager\AgencyResource;
use Filament\Resources\Pages\ListRecords;

class ListAgencies extends ListRecords
{
    protected static string $resource = AgencyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
