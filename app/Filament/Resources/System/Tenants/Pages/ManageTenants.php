<?php

namespace App\Filament\Resources\System\Tenants\Pages;

use App\Filament\Resources\System\Tenants\TenantResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageTenants extends ManageRecords
{
    protected static string $resource = TenantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
