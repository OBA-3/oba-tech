<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;


class ProjectTechnologyController extends Controller
{
    /**
     * Get all technologies of a project.
     */
    public function index(Project $project)
    {
        $technologies = $project->technologies()
            ->orderBy('name')
            ->get();

        return response()->json([
            'project' => [
                'id' => $project->id,
                'title' => $project->title,
                'slug' => $project->slug,
            ],
            'technologies' => $technologies,
        ]);
    }

    /**
     * Attach a technology to a project.
     */
    public function store(
        Request $request,
        Project $project
    ) {
        $validated = $request->validate([
            'technology_id' => [
                'required',
                'integer',
                'exists:technologies,id',
            ],
        ]);

        $technologyId = $validated['technology_id'];

        // Prevent duplicate relation
        if ($project->technologies()->where('technology_id', $technologyId)->exists()) {
            return response()->json([
                'message' => 'This technology is already attached to the project.',
            ], 422);
        }

        $project->technologies()->attach($technologyId);

        return response()->json([
            'message' => 'Technology attached to project successfully.',
            'data' => $project->technologies()
                ->where('technology_id', $technologyId)
                ->first(),
        ], 201);
    }

    /**
     * Detach a technology from a project.
     */
    public function destroy(
        Project $project,
        Technology $technology
    ) {
        // Check relation exists
        if (!$project->technologies()
            ->where('technology_id', $technology->id)
            ->exists()) {

            return response()->json([
                'message' => 'This technology is not attached to the project.',
            ], 422);
        }

        $project->technologies()->detach($technology->id);

        return response()->json([
            'message' => 'Technology detached from project successfully.',
        ]);
    }

    /**
     * Sync all technologies of a project.
     */
    public function sync(
        Request $request,
        Project $project
    ) {
        $validated = $request->validate([
            'technology_ids' => [
                'required',
                'array',
            ],
            'technology_ids.*' => [
                'integer',
                'exists:technologies,id',
            ],
        ]);

        $project->technologies()->sync(
            $validated['technology_ids']
        );

        return response()->json([
            'message' => 'Project technologies synchronized successfully.',
            'data' => $project->technologies()
                ->orderBy('name')
                ->get(),
        ]);
    }
}