<?php

namespace App\Http\Controllers;

use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::with([
                'category',
                'technologies',
                'images'
            ])
            ->whereRaw('LOWER(visibility) = ?', ['public'])
            ->where('featured', true)
            ->latest()
            ->take(3)
            ->get();

        return view('home', compact('projects'));
    }
}