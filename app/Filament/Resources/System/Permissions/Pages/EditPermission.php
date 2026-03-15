<?php

namespace App\Filament\Resources\System\Permissions\Pages;

use App\Filament\Resources\System\Permissions\PermissionResource;
use Filament\Resources\Pages\EditRecord;

class EditPermission extends EditRecord
{
    protected static string $resource = PermissionResource::class;
}
