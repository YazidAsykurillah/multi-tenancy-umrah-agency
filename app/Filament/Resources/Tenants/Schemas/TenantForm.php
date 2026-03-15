<?php

namespace App\Filament\Resources\Tenants\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class TenantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $context, $set, ?string $state) {
                        if ($context === 'create') {
                            $set('slug', \Illuminate\Support\Str::slug($state));
                        }
                    }),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->disabled(fn (string $context): bool => $context !== 'create'),
                Toggle::make('is_active')
                    ->label('Active Status')
                    ->default(true)
                    ->disabled(fn () => !auth()->user()->hasRole('Super Admin')),
            ]);
    }
}
