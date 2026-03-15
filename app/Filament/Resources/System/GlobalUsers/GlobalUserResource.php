<?php

namespace App\Filament\Resources\System\GlobalUsers;

use App\Filament\Resources\System\GlobalUsers\Pages\CreateUser;
use App\Filament\Resources\System\GlobalUsers\Pages\EditUser;
use App\Filament\Resources\System\GlobalUsers\Pages\ListUsers;
use App\Filament\Resources\System\GlobalUsers\Schemas\UserForm;
use App\Filament\Resources\System\GlobalUsers\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Notifications\Notification;

class GlobalUserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->hasRole(['Super Admin', 'Admin']);
    }

    public static function canCreate(): bool
    {
        return auth()->user()->hasRole('Super Admin');
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
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
