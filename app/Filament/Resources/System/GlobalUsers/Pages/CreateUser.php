<?php

namespace App\Filament\Resources\System\GlobalUsers\Pages;

use App\Filament\Resources\System\GlobalUsers\GlobalUserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = GlobalUserResource::class;
}
