<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Get all technologies.
     */
    public function index()
    {
        $technologies = Technology::orderBy('id')->get();

        return response()->json([
            'data' => $technologies,
        ]);
    }

    /**
     * Create a new technology.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:technologies,name',
            ],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:technologies,slug',
            ],
            'category' => [
                'nullable',
                'string',
                'max:100',
            ],
            'icon' => [
                'nullable',
                'string',
                'max:100',
            ],
            'description' => [
                'nullable',
                'string',
            ],
            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        $technology = Technology::create([
            'name' => $validated['name'],
            'slug' => $validated['slug']
                ?? Str::slug($validated['name']),
            'category' => $validated['category'] ?? null,
            'icon' => $validated['icon'] ?? null,
            'description' => $validated['description'] ?? null,
            'is_active' => $validated['is_active'] ?? true,
        ]);

        return response()->json([
            'message' => 'Technology created successfully.',
            'data' => $technology,
        ], 201);
    }

    /**
     * Update a technology.
     */
    public function update(
        Request $request,
        Technology $technology
    ) {
        $validated = $request->validate([
            'name' => [
                'sometimes',
                'string',
                'max:255',
                'unique:technologies,name,' . $technology->id,
            ],
            'slug' => [
                'sometimes',
                'nullable',
                'string',
                'max:255',
                'unique:technologies,slug,' . $technology->id,
            ],
            'category' => [
                'sometimes',
                'nullable',
                'string',
                'max:100',
            ],
            'icon' => [
                'sometimes',
                'nullable',
                'string',
                'max:100',
            ],
            'description' => [
                'sometimes',
                'nullable',
                'string',
            ],
            'is_active' => [
                'sometimes',
                'boolean',
            ],
        ]);

        // Generate slug automatically if name changes
        // and slug is not provided
        if (
            isset($validated['name']) &&
            !array_key_exists('slug', $validated)
        ) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $technology->update($validated);

        return response()->json([
            'message' => 'Technology updated successfully.',
            'data' => $technology->fresh(),
        ]);
    }

    /**
     * Delete a technology.
     */
    public function destroy(Technology $technology)
    {
        // Prevent deletion if technology is linked to projects
        if ($technology->projects()->exists()) {
            return response()->json([
                'message' => 'Cannot delete this technology because it is associated with projects.',
            ], 422);
        }

        $technology->delete();

        return response()->json([
            'message' => 'Technology deleted successfully.',
        ]);
    }
}