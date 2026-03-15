<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    use BelongsToTenant;

    protected $fillable = [
        'tenant_id',
        'name',
        'price',
        'duration_days',
        'airline',
        'hotel',
        'description',
    ];

    public function departures(): HasMany
    {
        return $this->hasMany(Departure::class);
    }
}
