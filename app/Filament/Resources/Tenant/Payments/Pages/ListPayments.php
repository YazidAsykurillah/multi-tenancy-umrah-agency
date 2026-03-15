<?php

namespace App\Filament\Resources\Tenant\Payments\Pages;

use App\Filament\Resources\Tenant\Payments\PaymentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPayments extends ListRecords
{
    protected static string $resource = PaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
