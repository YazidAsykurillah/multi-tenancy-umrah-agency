<?php

namespace App\Filament\Pages\Tenancy;

use App\Filament\Resources\System\Tenants\Schemas\TenantForm;
use Filament\Schemas\Schema;
use Filament\Pages\Tenancy\EditTenantProfile as BaseEditTenantProfile;

class EditTenantProfile extends BaseEditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Agency Profile';
    }

    public function form(Schema $schema): Schema
    {
        return TenantForm::configure($schema);
    }
}
