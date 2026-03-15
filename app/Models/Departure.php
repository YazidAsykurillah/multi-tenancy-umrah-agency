<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departure extends Model
{
    use BelongsToTenant;

    protected $fillable = [
        'tenant_id',
        'package_id',
        'departure_date',
        'return_date',
        'quota',
        'status',
    ];

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function pilgrims(): HasMany
    {
        return $this->hasMany(Pilgrim::class);
    }
}
