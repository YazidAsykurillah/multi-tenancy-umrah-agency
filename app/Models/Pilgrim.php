<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pilgrim extends Model
{
    use BelongsToTenant;

    protected $fillable = [
        'tenant_id',
        'departure_id',
        'name',
        'nik',
        'passport_number',
        'phone',
        'birth_date',
        'address',
        'status',
    ];

    public function departure(): BelongsTo
    {
        return $this->belongsTo(Departure::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}
