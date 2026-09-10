<?php

namespace App\Models;

use App\Services\SupabaseStorageService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'path',
        'alt_text',
        'sort_order',
        'is_featured',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_featured' => 'boolean',
    ];

    /**
     * Automatically append image_url when converting to array or JSON.
     */
    protected $appends = [
        'image_url',
    ];

    /**
     * Project that owns this image.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the public URL of the image from Supabase Storage.
     */
    public function getImageUrlAttribute(): ?string
    {
        if (!$this->path) {
            return null;
        }

        return app(SupabaseStorageService::class)
            ->getPublicUrl($this->path);
    }
}