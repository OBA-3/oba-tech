<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'short_description',
        'description',
        'challenge',
        'solution',
        'role',
        'client_type',
        'project_type',
        'duration',
        'status',
        'visibility',
        'featured',
        'cover_image',
        'demo_url',
        'video_url',
        'github_url',
        'results',
        'published_at',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * The category that owns the project.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }
    public function teamMembers(): BelongsToMany
    {
        return $this->belongsToMany(TeamMember::class)
            ->withPivot('role');
    }
    public function images(): HasMany
{
    return $this->hasMany(ProjectImage::class)
        ->orderBy('sort_order');
}
}