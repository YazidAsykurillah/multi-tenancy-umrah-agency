<?php

namespace App\Filament\Resources\Tenant\Payments\Pages;

use App\Filament\Resources\Tenant\Payments\PaymentResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePayment extends CreateRecord
{
    protected static string $resource = PaymentResource::class;
}
