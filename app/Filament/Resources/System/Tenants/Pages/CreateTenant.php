<?php

namespace App\Filament\Resources\System\Tenants\Pages;

use App\Filament\Resources\System\Tenants\TenantResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTenant extends CreateRecord
{
    protected static string $resource = TenantResource::class;
}
