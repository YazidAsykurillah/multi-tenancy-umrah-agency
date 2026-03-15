<?php

namespace App\Filament\Resources\System\Roles\Pages;

use App\Filament\Resources\System\Roles\RoleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRole extends CreateRecord
{
    protected static string $resource = RoleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['team_id'] = null;

        return $data;
    }
}
