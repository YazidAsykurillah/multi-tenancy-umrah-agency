<?php

namespace App\Filament\Pages\Manager;

use App\Models\Tenant;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ManagerDashboard extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;

    protected string $view = 'filament.pages.manager.manager-dashboard';

    protected static ?string $title = 'Dashboard';

    protected static ?string $navigationLabel = 'Dashboard';

    protected static ?string $slug = 'dashboard';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Tenant::query()->whereHas('users', fn (Builder $query) => $query->where('users.id', auth()->id()))
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Agency Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->badge()
                    ->color('gray'),
            ])
            ->actions([
                Action::make('enter')
                    ->label('Enter Agency')
                    ->icon('heroicon-m-arrow-right-circle')
                    ->color('success')
                    ->url(fn (Tenant $record): string => "/app/tenant/{$record->id}"),
            ])
            ->emptyStateHeading('No Agencies Found')
            ->emptyStateDescription('You are not associated with any agencies yet.');
    }
}
