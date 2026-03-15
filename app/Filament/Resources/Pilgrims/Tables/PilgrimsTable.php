<?php

namespace App\Filament\Resources\Pilgrims\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PilgrimsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('nik')
                    ->label('NIK')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('departure.departure_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'prospect' => 'gray',
                        'deposit_paid' => 'info',
                        'fully_paid' => 'success',
                        'document_processing' => 'warning',
                        'visa_approved' => 'success',
                        'ready_to_depart' => 'success',
                        default => 'gray',
                    }),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'prospect' => 'Prospect',
                        'deposit_paid' => 'Deposit Paid',
                        'fully_paid' => 'Fully Paid',
                        'document_processing' => 'Document Processing',
                        'visa_approved' => 'Visa Approved',
                        'ready_to_depart' => 'Ready to Depart',
                    ]),
                SelectFilter::make('departure_id')
                    ->relationship('departure', 'departure_date')
                    ->label('Departure'),
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
