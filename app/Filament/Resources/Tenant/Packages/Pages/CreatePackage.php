<?php

namespace App\Filament\Resources\Tenant\Packages\Pages;

use App\Filament\Resources\Tenant\Packages\PackageResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePackage extends CreateRecord
{
    protected static string $resource = PackageResource::class;
}
