<?php

namespace App\Filament\Resources\Tenant\Users\Pages;

use App\Filament\Resources\Tenant\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
