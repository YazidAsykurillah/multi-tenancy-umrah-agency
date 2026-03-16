<?php

namespace App\Filament\Resources\Tenant\Packages;

use App\Filament\Resources\Tenant\Packages\Pages\CreatePackage;
use App\Filament\Resources\Tenant\Packages\Pages\EditPackage;
use App\Filament\Resources\Tenant\Packages\Pages\ListPackages;
use App\Filament\Resources\Tenant\Packages\Schemas\PackageForm;
use App\Filament\Resources\Tenant\Packages\Tables\PackagesTable;
use App\Models\Package;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static ?string $slug = 'packages';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PackageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PackagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPackages::route('/'),
            'create' => CreatePackage::route('/create'),
            'edit' => EditPackage::route('/{record}/edit'),
        ];
    }
}
