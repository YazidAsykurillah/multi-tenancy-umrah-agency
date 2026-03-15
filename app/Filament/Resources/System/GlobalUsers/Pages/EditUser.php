<?php

namespace App\Filament\Resources\System\GlobalUsers\Pages;

use App\Filament\Resources\System\GlobalUsers\GlobalUserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = GlobalUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
