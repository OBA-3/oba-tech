<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamMemberController extends Controller
{
    /**
     * Get all team members.
     */
    public function index()
    {
        $teamMembers = TeamMember::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return response()->json([
            'data' => $teamMembers,
        ]);
    }
    /**
     * Get a single team member.
     */
    public function show(TeamMember $teamMember)
    {
        return response()->json([
            'data' => $teamMember,
        ]);
    }

    /**
     * Create a new team member.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:team_members,name',
            ],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:team_members,slug',
            ],
            'role' => [
                'required',
                'string',
                'max:255',
            ],
            'bio' => [
                'nullable',
                'string',
            ],
            'photo' => [
                'nullable',
                'string',
                'max:255',
            ],
            'email' => [
                'nullable',
                'email',
                'max:255',
            ],
            'linkedin_url' => [
                'nullable',
                'url',
                'max:255',
            ],
            'github_url' => [
                'nullable',
                'url',
                'max:255',
            ],
            'is_active' => [
                'nullable',
                'boolean',
            ],
            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);

        $teamMember = TeamMember::create([
            'name' => $validated['name'],
            'slug' => $validated['slug']
                ?? Str::slug($validated['name']),
            'role' => $validated['role'],
            'bio' => $validated['bio'] ?? null,
            'photo' => $validated['photo'] ?? null,
            'email' => $validated['email'] ?? null,
            'linkedin_url' => $validated['linkedin_url'] ?? null,
            'github_url' => $validated['github_url'] ?? null,
            'is_active' => $validated['is_active'] ?? true,
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return response()->json([
            'message' => 'Team member created successfully.',
            'data' => $teamMember,
        ], 201);
    }

    /**
     * Update a team member.
     */
    public function update(
        Request $request,
        TeamMember $teamMember
    ) {
        $validated = $request->validate([
            'name' => [
                'sometimes',
                'string',
                'max:255',
                'unique:team_members,name,' . $teamMember->id,
            ],
            'slug' => [
                'sometimes',
                'nullable',
                'string',
                'max:255',
                'unique:team_members,slug,' . $teamMember->id,
            ],
            'role' => [
                'sometimes',
                'string',
                'max:255',
            ],
            'bio' => [
                'sometimes',
                'nullable',
                'string',
            ],
            'photo' => [
                'sometimes',
                'nullable',
                'string',
                'max:255',
            ],
            'email' => [
                'sometimes',
                'nullable',
                'email',
                'max:255',
            ],
            'linkedin_url' => [
                'sometimes',
                'nullable',
                'url',
                'max:255',
            ],
            'github_url' => [
                'sometimes',
                'nullable',
                'url',
                'max:255',
            ],
            'is_active' => [
                'sometimes',
                'boolean',
            ],
            'sort_order' => [
                'sometimes',
                'integer',
                'min:0',
            ],
        ]);

        // Generate slug automatically when name changes
        // and slug is not provided
        if (
            isset($validated['name']) &&
            !array_key_exists('slug', $validated)
        ) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $teamMember->update($validated);

        return response()->json([
            'message' => 'Team member updated successfully.',
            'data' => $teamMember->fresh(),
        ]);
    }

    /**
     * Delete a team member.
     */
    public function destroy(TeamMember $teamMember)
    {
        // Prevent deletion if member is linked to projects
        if ($teamMember->projects()->exists()) {
            return response()->json([
                'message' => 'Cannot delete this team member because they are associated with projects.',
            ], 422);
        }

        $teamMember->delete();

        return response()->json([
            'message' => 'Team member deleted successfully.',
        ]);
    }
}
