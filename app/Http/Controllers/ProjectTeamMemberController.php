<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class ProjectTeamMemberController extends Controller
{
    /**
     * Get all team members of a project.
     */
    public function index(Project $project)
    {
        $teamMembers = $project->teamMembers()
            ->orderBy('sort_order')
            ->get();

        return response()->json([
            'project' => [
                'id' => $project->id,
                'title' => $project->title,
                'slug' => $project->slug,
            ],
            'team_members' => $teamMembers,
        ]);
    }

    /**
     * Attach a team member to a project.
     */
    public function store(
        Request $request,
        Project $project
    ) {
        $validated = $request->validate([
            'team_member_id' => [
                'required',
                'integer',
                'exists:team_members,id',
            ],
            'role' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        $teamMemberId = $validated['team_member_id'];

        // Prevent duplicate relation
        if (
            $project->teamMembers()
                ->where('team_member_id', $teamMemberId)
                ->exists()
        ) {
            return response()->json([
                'message' => 'This team member is already attached to the project.',
            ], 422);
        }

        $project->teamMembers()->attach(
            $teamMemberId,
            [
                'role' => $validated['role'] ?? null,
            ]
        );

        $teamMember = $project->teamMembers()
            ->where('team_member_id', $teamMemberId)
            ->first();

        return response()->json([
            'message' => 'Team member attached to project successfully.',
            'data' => $teamMember,
        ], 201);
    }

    /**
     * Update team member role in a project.
     */
    public function update(
        Request $request,
        Project $project,
        TeamMember $teamMember
    ) {
        $validated = $request->validate([
            'role' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        // Check relation exists
        if (
            !$project->teamMembers()
                ->where('team_member_id', $teamMember->id)
                ->exists()
        ) {
            return response()->json([
                'message' => 'This team member is not attached to the project.',
            ], 422);
        }

        $project->teamMembers()->updateExistingPivot(
            $teamMember->id,
            [
                'role' => $validated['role'] ?? null,
            ]
        );

        $updatedMember = $project->teamMembers()
            ->where('team_member_id', $teamMember->id)
            ->first();

        return response()->json([
            'message' => 'Team member role updated successfully.',
            'data' => $updatedMember,
        ]);
    }

    /**
     * Detach a team member from a project.
     */
    public function destroy(
        Project $project,
        TeamMember $teamMember
    ) {
        // Check relation exists
        if (
            !$project->teamMembers()
                ->where('team_member_id', $teamMember->id)
                ->exists()
        ) {
            return response()->json([
                'message' => 'This team member is not attached to the project.',
            ], 422);
        }

        $project->teamMembers()->detach($teamMember->id);

        return response()->json([
            'message' => 'Team member detached from project successfully.',
        ]);
    }

    /**
     * Synchronize all team members of a project.
     */
    public function sync(
        Request $request,
        Project $project
    ) {
        $validated = $request->validate([
            'team_members' => [
                'required',
                'array',
            ],
            'team_members.*.id' => [
                'required',
                'integer',
                'exists:team_members,id',
            ],
            'team_members.*.role' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        $syncData = [];

        foreach ($validated['team_members'] as $member) {
            $syncData[$member['id']] = [
                'role' => $member['role'] ?? null,
            ];
        }

        $project->teamMembers()->sync($syncData);

        return response()->json([
            'message' => 'Project team members synchronized successfully.',
            'data' => $project->teamMembers()
                ->orderBy('sort_order')
                ->get(),
        ]);
    }
}