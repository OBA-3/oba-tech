<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Project;
use App\Models\TeamMember;
use App\Models\Technology;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Get Category
        |--------------------------------------------------------------------------
        */

        $category = Category::where(
            'slug',
            'mobile-applications'
        )->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Create AMAN Project
        |--------------------------------------------------------------------------
        */

        $project = Project::updateOrCreate(
            [
                'slug' => 'aman',
            ],
            [
                'category_id' => $category->id,

                'title' => 'AMAN',

                'short_description' =>
                    'A secure digital solution designed to support financial inclusion and simplify digital financial services.',

                'description' =>
                    'AMAN is a modern digital platform designed to improve financial inclusion through secure and accessible digital services. The project focuses on simplifying financial operations and providing users with an intuitive and reliable experience.',

                'challenge' =>
                    'The challenge was to design a secure and accessible digital solution that could support users with limited access to traditional financial services.',

                'solution' =>
                    'We designed a modern cross-platform application using Flutter and FlutterFlow, supported by Supabase services for data management and backend capabilities.',

                'role' =>
                    'Mobile application development, backend integration and database design.',

                'client_type' => 'Internal Project',

                'project_type' => 'Mobile Application',

                'duration' => '6 months',

                'status' => 'Completed',

                'visibility' => 'public',

                'featured' => true,

                'cover_image' => null,

                'demo_url' => null,

                'video_url' => null,

                'github_url' => null,

                'results' =>
                    'A functional prototype demonstrating secure digital services, multi-account management and a modern mobile user experience.',

                'published_at' => now(),
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Attach Technologies
        |--------------------------------------------------------------------------
        */

        $technologies = Technology::whereIn(
            'slug',
            [
                'flutter',
                'flutterflow',
                'supabase',
            ]
        )->pluck('id');

        $project->technologies()->sync(
            $technologies
        );

        /*
        |--------------------------------------------------------------------------
        | Attach Team Members
        |--------------------------------------------------------------------------
        */

        $teamMembers = TeamMember::whereIn(
            'slug',
            [
                'belgacem-yassine',
                'achachi-mouhammed',
                'oubachire-mouhamed',
            ]
        )->get();

        foreach ($teamMembers as $member) {

            $role = match ($member->slug) {

                'belgacem-yassine' =>
                    'Backend and Database Development',

                'achachi-mouhammed' =>
                    'Full Stack Development',

                'oubachire-mouhamed' =>
                    'Mobile Application Development',

                default =>
                    null,
            };

            $project->teamMembers()->syncWithoutDetaching([
                $member->id => [
                    'role' => $role,
                ],
            ]);
        }
    }
}