<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use BelongsToTenant;
    
    protected static function booted()
    {
        static::deleted(function (Document $document) {
            if ($document->file_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($document->file_path);
            }
        });

        static::updating(function (Document $document) {
            if ($document->isDirty('file_path') && $document->getOriginal('file_path')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($document->getOriginal('file_path'));
            }
        });
    }

    protected $fillable = [
        'tenant_id',
        'pilgrim_id',
        'document_type',
        'status',
        'file_path',
    ];

    public function pilgrim(): BelongsTo
    {
        return $this->belongsTo(Pilgrim::class);
    }
}
