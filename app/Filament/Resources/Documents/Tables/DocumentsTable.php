<?php

namespace App\Filament\Resources\Documents\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DocumentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pilgrim.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('document_type')
                    ->badge()
                    ->icon(fn (string $state): string => match ($state) {
                        'passport' => 'heroicon-o-identification',
                        'visa' => 'heroicon-o-ticket',
                        'ticket' => 'heroicon-o-paper-airplane',
                        'vaccine' => 'heroicon-o-shield-check',
                        'insurance' => 'heroicon-o-document-check',
                        default => 'heroicon-o-document',
                    }),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'not_submitted' => 'danger',
                        'processing' => 'warning',
                        'completed' => 'success',
                        default => 'gray',
                    }),
                TextColumn::make('file_path')
                    ->label('File')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('primary')
                    ->url(fn ($record) => $record->file_path ? \Illuminate\Support\Facades\Storage::disk('public')->url($record->file_path) : null)
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn () => 'View/Download'),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
