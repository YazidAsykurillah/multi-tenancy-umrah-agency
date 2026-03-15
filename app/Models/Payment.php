<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use BelongsToTenant;

    protected $fillable = [
        'tenant_id',
        'pilgrim_id',
        'amount',
        'payment_date',
        'payment_method',
        'note',
    ];

    public function pilgrim(): BelongsTo
    {
        return $this->belongsTo(Pilgrim::class);
    }
}
