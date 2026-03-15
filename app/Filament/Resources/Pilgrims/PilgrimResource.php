<?php

namespace App\Filament\Resources\Pilgrims;

use App\Filament\Resources\Pilgrims\Pages\CreatePilgrim;
use App\Filament\Resources\Pilgrims\Pages\EditPilgrim;
use App\Filament\Resources\Pilgrims\Pages\ListPilgrims;
use App\Filament\Resources\Pilgrims\Schemas\PilgrimForm;
use App\Filament\Resources\Pilgrims\Tables\PilgrimsTable;
use App\Models\Pilgrim;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PilgrimResource extends Resource
{
    protected static ?string $model = Pilgrim::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PilgrimForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PilgrimsTable::configure($table);
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
            'index' => ListPilgrims::route('/'),
            'create' => CreatePilgrim::route('/create'),
            'edit' => EditPilgrim::route('/{record}/edit'),
        ];
    }
}
