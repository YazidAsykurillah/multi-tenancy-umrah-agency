<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use App\Models\User;
use Illuminate\Support\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('roles.name')
                    ->badge()
                    ->color('info'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
                    ->before(function (DeleteAction $action, User $record) {
                        if ($record->hasRole('Owner')) {
                            $ownersCount = User::role('Owner')->count();
                            if ($ownersCount <= 1) {
                                Notification::make()
                                    ->danger()
                                    ->title('Cannot delete last owner')
                                    ->body('Each agency must have at least one owner.')
                                    ->send();
                                
                                $action->halt();
                            }
                        }
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->before(function (DeleteBulkAction $action, Collection $records) {
                            $ownersInSelection = $records->filter(fn ($user) => $user->hasRole('Owner'));
                            if ($ownersInSelection->count() > 0) {
                                $totalOwners = User::role('Owner')->count();
                                if ($totalOwners - $ownersInSelection->count() < 1) {
                                    Notification::make()
                                        ->danger()
                                        ->title('Cannot delete last owner')
                                        ->body('Each agency must have at least one owner.')
                                        ->send();
                                    
                                    $action->halt();
                                }
                            }
                        }),
                ]),
            ]);
    }
}
