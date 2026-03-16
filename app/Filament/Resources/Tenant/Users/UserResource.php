<?php

namespace App\Filament\Resources\Tenant\Users;

use App\Filament\Resources\Tenant\Users\Pages\CreateUser;
use App\Filament\Resources\Tenant\Users\Pages\EditUser;
use App\Filament\Resources\Tenant\Users\Pages\ListUsers;
use App\Filament\Resources\Tenant\Users\Schemas\UserForm;
use App\Filament\Resources\Tenant\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Notifications\Notification;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $slug = 'users';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $tenantOwnershipRelationshipName = 'tenants';

    public static function getTenantRelationshipName(): string
    {
        return 'tenants';
    }

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table)
            ->modifyQueryUsing(fn (Builder $query) => $query->whereDoesntHave('roles', fn ($q) => $q->where('name', 'Super Admin'))); // Hide super admins if any
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
