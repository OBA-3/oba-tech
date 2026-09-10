<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    /**
     * Display all public projects.
     */
    public function index(): JsonResponse
    {
        $projects = Project::with([
            'category',
            'technologies',
            'images',
        ])
        ->where('visibility', 'public')
        ->where('status', 'Completed')
        ->orderByDesc('featured')
        ->orderByDesc('published_at')
        ->get();

        return response()->json([
            'data' => $projects,
        ]);
    }

    /**
     * Display featured projects.
     */
    public function featured(): JsonResponse
    {
        $projects = Project::with([
            'category',
            'technologies',
            'images',
        ])
        ->where('visibility', 'public')
        ->where('status', 'Completed')
        ->where('featured', true)
        ->orderByDesc('published_at')
        ->get();

        return response()->json([
            'data' => $projects,
        ]);
    }

    /**
     * Display a single project by slug.
     */
    public function show(string $slug): JsonResponse
    {
        $project = Project::with([
            'category',
            'technologies',
            'teamMembers',
            'images',
        ])
        ->where('slug', $slug)
        ->where('visibility', 'public')
        ->firstOrFail();

        return response()->json([
            'data' => $project,
        ]);
    }
}