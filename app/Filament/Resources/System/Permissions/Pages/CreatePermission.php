<?php

namespace App\Filament\Resources\System\Permissions\Pages;

use App\Filament\Resources\System\Permissions\PermissionResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePermission extends CreateRecord
{
    protected static string $resource = PermissionResource::class;
}
