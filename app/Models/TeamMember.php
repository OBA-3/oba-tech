<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'role',
        'bio',
        'photo',
        'email',
        'linkedin_url',
        'github_url',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
    public function projects(): BelongsToMany
{
    return $this->belongsToMany(Project::class)
        ->withPivot('role');
}
}