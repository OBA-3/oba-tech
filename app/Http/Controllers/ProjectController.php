<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function show(string $slug)
    {
        $project = Project::with([
            'category',
            'technologies',
            'teamMembers',
            'images',
        ])
            ->where('slug', $slug)
            ->whereRaw('LOWER(visibility) = ?', ['public'])
            ->firstOrFail();

        return view('projects.show', compact('project'));
    }
}