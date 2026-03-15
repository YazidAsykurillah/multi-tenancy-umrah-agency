<?php

namespace App\Filament\Resources\System\GlobalUsers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create'),
                Select::make('roles')
                    ->relationship('roles', 'name', fn ($query) => $query->where($query->getModel()->getTable() . '.team_id', getPermissionsTeamId()))
                    ->saveRelationshipsUsing(function (\Illuminate\Database\Eloquent\Model $record, $state) {
                        $teamId = getPermissionsTeamId();
                        $syncData = [];
                        foreach ($state as $roleId) {
                            $syncData[$roleId] = ['team_id' => $teamId];
                        }
                        $record->roles()->sync($syncData);
                    })
                    ->multiple()
                    ->preload()
                    ->required(),
            ]);
    }
}
