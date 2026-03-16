<?php

namespace App\Filament\Resources\Manager;

use App\Filament\Resources\Manager\AgencyResource\Pages;
use App\Models\Tenant;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AgencyResource extends Resource
{
    protected static ?string $model = Tenant::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'My Agencies';

    protected static ?string $pluralLabel = 'Agencies';

    protected static ?string $slug = 'agencies';

    protected static bool $shouldRegisterNavigation = false;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereHas('users', function ($query) {
            $query->where('users.id', auth()->id());
        });
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->badge()
                    ->color('gray'),
            ])
            ->actions([
                Action::make('enter')
                    ->label('Enter Agency')
                    ->icon('heroicon-m-arrow-right-circle')
                    ->color('success')
                    ->url(fn (Tenant $record): string => "/app/tenant/{$record->id}"),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAgencies::route('/'),
        ];
    }
}
