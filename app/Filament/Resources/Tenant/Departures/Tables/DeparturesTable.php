<?php

namespace App\Filament\Resources\Tenant\Departures\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DeparturesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('package.name')
                    ->sortable(),
                TextColumn::make('departure_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('return_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('quota')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('pilgrims_count')
                    ->counts('pilgrims')
                    ->label('Joined'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'planned' => 'gray',
                        'open' => 'success',
                        'full' => 'warning',
                        'closed' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
