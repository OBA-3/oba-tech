<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
 * Get all projects for admin.
 */
public function index(Request $request)
{
    $query = Project::with([
        'category',
        'technologies',
        'teamMembers',
        'images',
    ]);

    // Search by title
    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%");
        });
    }

    // Filter by category
    if ($request->filled('category_id')) {
        $query->where(
            'category_id',
            $request->category_id
        );
    }

    // Filter by status
    if ($request->filled('status')) {
        $query->where(
            'status',
            $request->status
        );
    }

    // Filter by visibility
    if ($request->filled('visibility')) {
        $query->where(
            'visibility',
            $request->visibility
        );
    }

    // Filter featured projects
    if ($request->has('featured')) {
        $query->where(
            'featured',
            $request->boolean('featured')
        );
    }

    $perPage = min(
        max((int) $request->input('per_page', 10), 1),
        100
    );

    $projects = $query
        ->latest()
        ->paginate($perPage);

    return response()->json($projects);
}

/**
 * Get a single project for admin.
 */
public function show(Project $project)
{
    $project->load([
        'category',
        'technologies',
        'teamMembers',
        'images',
    ]);

    return response()->json([
        'data' => $project,
    ]);
}
    /**
     * Create a new project.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => [
                'required',
                'exists:categories,id',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'short_description' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'challenge' => [
                'nullable',
                'string',
            ],

            'solution' => [
                'nullable',
                'string',
            ],

            'role' => [
                'nullable',
                'string',
            ],

            'client_type' => [
                'nullable',
                'string',
                'max:255',
            ],

            'project_type' => [
                'nullable',
                'string',
                'max:255',
            ],

            'duration' => [
                'nullable',
                'string',
                'max:255',
            ],

            'status' => [
                'nullable',
                'string',
                'max:255',
            ],

            'visibility' => [
                'nullable',
                'string',
                'max:255',
            ],

            'featured' => [
                'nullable',
                'boolean',
            ],

            'demo_url' => [
                'nullable',
                'url',
            ],

            'video_url' => [
                'nullable',
                'url',
            ],

            'github_url' => [
                'nullable',
                'url',
            ],

            'results' => [
                'nullable',
                'string',
            ],

            'published_at' => [
                'nullable',
                'date',
            ],

            // Technologies IDs
            'technology_ids' => [
                'nullable',
                'array',
            ],

            'technology_ids.*' => [
                'exists:technologies,id',
            ],

            // Team members
            'team_members' => [
                'nullable',
                'array',
            ],

            'team_members.*.id' => [
                'required',
                'exists:team_members,id',
            ],

            'team_members.*.role' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        // Generate unique slug
        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;

        while (Project::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        // Create project
        $project = Project::create([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'short_description' => $validated['short_description'],
            'description' => $validated['description'] ?? null,
            'challenge' => $validated['challenge'] ?? null,
            'solution' => $validated['solution'] ?? null,
            'role' => $validated['role'] ?? null,
            'client_type' => $validated['client_type'] ?? 'Personal',
            'project_type' => $validated['project_type'] ?? 'Team',
            'duration' => $validated['duration'] ?? null,
            'status' => $validated['status'] ?? 'Draft',
            'visibility' => $validated['visibility'] ?? 'Public',
            'featured' => $validated['featured'] ?? false,
            'demo_url' => $validated['demo_url'] ?? null,
            'video_url' => $validated['video_url'] ?? null,
            'github_url' => $validated['github_url'] ?? null,
            'results' => $validated['results'] ?? null,
            'published_at' => $validated['published_at'] ?? null,
        ]);

        // Attach technologies
        if (!empty($validated['technology_ids'])) {
            $project->technologies()
                ->sync($validated['technology_ids']);
        }

        // Attach team members with their project roles
        if (!empty($validated['team_members'])) {

            $teamMembers = [];

            foreach ($validated['team_members'] as $member) {
                $teamMembers[$member['id']] = [
                    'role' => $member['role'] ?? null,
                ];
            }

            $project->teamMembers()
                ->sync($teamMembers);
        }

        // Load relations
        $project->load([
            'category',
            'technologies',
            'teamMembers',
            'images',
        ]);

        return response()->json([
            'message' => 'Project created successfully.',
            'data' => $project,
        ], 201);
    }
    /**
 * Update an existing project.
 */
public function update(Request $request, Project $project)
{
    $validated = $request->validate([

        'category_id' => [
            'sometimes',
            'exists:categories,id',
        ],

        'title' => [
            'sometimes',
            'string',
            'max:255',
        ],

        'short_description' => [
            'sometimes',
            'string',
            'max:255',
        ],

        'description' => [
            'sometimes',
            'nullable',
            'string',
        ],

        'challenge' => [
            'sometimes',
            'nullable',
            'string',
        ],

        'solution' => [
            'sometimes',
            'nullable',
            'string',
        ],

        'role' => [
            'sometimes',
            'nullable',
            'string',
        ],

        'client_type' => [
            'sometimes',
            'nullable',
            'string',
            'max:255',
        ],

        'project_type' => [
            'sometimes',
            'nullable',
            'string',
            'max:255',
        ],

        'duration' => [
            'sometimes',
            'nullable',
            'string',
            'max:255',
        ],

        'status' => [
            'sometimes',
            'nullable',
            'string',
            'max:255',
        ],

        'visibility' => [
            'sometimes',
            'nullable',
            'string',
            'max:255',
        ],

        'featured' => [
            'sometimes',
            'boolean',
        ],

        'demo_url' => [
            'sometimes',
            'nullable',
            'url',
        ],

        'video_url' => [
            'sometimes',
            'nullable',
            'url',
        ],

        'github_url' => [
            'sometimes',
            'nullable',
            'url',
        ],

        'results' => [
            'sometimes',
            'nullable',
            'string',
        ],

        'published_at' => [
            'sometimes',
            'nullable',
            'date',
        ],

        // Technologies
        'technology_ids' => [
            'sometimes',
            'array',
        ],

        'technology_ids.*' => [
            'exists:technologies,id',
        ],

        // Team Members
        'team_members' => [
            'sometimes',
            'array',
        ],

        'team_members.*.id' => [
            'required',
            'exists:team_members,id',
        ],

        'team_members.*.role' => [
            'nullable',
            'string',
            'max:255',
        ],
    ]);

    /*
    |--------------------------------------------------------------------------
    | Update slug if title changed
    |--------------------------------------------------------------------------
    */

    if (
        isset($validated['title']) &&
        $validated['title'] !== $project->title
    ) {

        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;

        while (
            Project::where('slug', $slug)
                ->where('id', '!=', $project->id)
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $validated['slug'] = $slug;
    }

    /*
    |--------------------------------------------------------------------------
    | Remove relationship fields from project data
    |--------------------------------------------------------------------------
    */

    $technologyIds = $validated['technology_ids'] ?? null;
    $teamMembers = $validated['team_members'] ?? null;

    unset(
        $validated['technology_ids'],
        $validated['team_members']
    );

    /*
    |--------------------------------------------------------------------------
    | Update project
    |--------------------------------------------------------------------------
    */

    $project->update($validated);

    /*
    |--------------------------------------------------------------------------
    | Update technologies
    |--------------------------------------------------------------------------
    */

    if ($technologyIds !== null) {

        $project->technologies()
            ->sync($technologyIds);
    }

    /*
    |--------------------------------------------------------------------------
    | Update team members
    |--------------------------------------------------------------------------
    */

    if ($teamMembers !== null) {

        $members = [];

        foreach ($teamMembers as $member) {

            $members[$member['id']] = [
                'role' => $member['role'] ?? null,
            ];
        }

        $project->teamMembers()
            ->sync($members);
    }

    /*
    |--------------------------------------------------------------------------
    | Load relations
    |--------------------------------------------------------------------------
    */

    $project->load([
        'category',
        'technologies',
        'teamMembers',
        'images',
    ]);

    return response()->json([
        'message' => 'Project updated successfully.',
        'data' => $project,
    ]);
}
/**
 * Delete a project and all its images.
 */
public function destroy(
    Project $project,
    \App\Services\SupabaseStorageService $storage
) {
    // Delete all project images from Supabase Storage
    foreach ($project->images as $image) {

        $response = $storage->delete($image->path);

        if ($response->failed()) {
            return response()->json([
                'message' => 'Failed to delete project image from storage.',
                'image_id' => $image->id,
            ], 500);
        }
    }

    // Delete project
    $project->delete();

    return response()->json([
        'message' => 'Project deleted successfully.',
    ]);
}
}