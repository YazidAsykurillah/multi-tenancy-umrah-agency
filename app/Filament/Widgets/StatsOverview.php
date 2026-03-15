<?php

namespace App\Filament\Widgets;

use App\Models\Departure;
use App\Models\Document;
use App\Models\Payment;
use App\Models\Pilgrim;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Pilgrims', Pilgrim::count()),
            Stat::make('Active Departures', Departure::where('status', 'open')->count()),
            Stat::make('Unpaid/Partial Pilgrims', Pilgrim::whereDoesntHave('payments', function ($query) {
                // Simplified: assuming full payment is tracked by status for MVP
            })->whereIn('status', ['prospect', 'deposit_paid'])->count()),
            Stat::make('Pending Documents', Document::where('status', '!=', 'completed')->count()),
        ];
    }
}
