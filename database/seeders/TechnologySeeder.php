<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        $technologies = [

            // Backend
            [
                'name' => 'PHP',
                'slug' => 'php',
                'category' => 'Backend',
                'icon' => 'php',
                'description' => 'Server-side programming language for web development.',
                'is_active' => true,
            ],
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'category' => 'Backend',
                'icon' => 'laravel',
                'description' => 'PHP framework for building modern web applications.',
                'is_active' => true,
            ],
            [
                'name' => 'Spring Boot',
                'slug' => 'spring-boot',
                'category' => 'Backend',
                'icon' => 'spring',
                'description' => 'Framework for building robust backend applications and APIs.',
                'is_active' => true,
            ],

            // Frontend
            [
                'name' => 'HTML',
                'slug' => 'html',
                'category' => 'Frontend',
                'icon' => 'html5',
                'description' => 'Markup language for structuring web interfaces.',
                'is_active' => true,
            ],
            [
                'name' => 'CSS',
                'slug' => 'css',
                'category' => 'Frontend',
                'icon' => 'css3',
                'description' => 'Stylesheet language for designing web interfaces.',
                'is_active' => true,
            ],
            [
                'name' => 'JavaScript',
                'slug' => 'javascript',
                'category' => 'Frontend',
                'icon' => 'javascript',
                'description' => 'Programming language for interactive web experiences.',
                'is_active' => true,
            ],
            [
                'name' => 'Tailwind CSS',
                'slug' => 'tailwind-css',
                'category' => 'Frontend',
                'icon' => 'tailwindcss',
                'description' => 'Utility-first CSS framework for modern user interfaces.',
                'is_active' => true,
            ],

            // Mobile
            [
                'name' => 'Flutter',
                'slug' => 'flutter',
                'category' => 'Mobile',
                'icon' => 'flutter',
                'description' => 'Framework for building cross-platform mobile applications.',
                'is_active' => true,
            ],
            [
                'name' => 'FlutterFlow',
                'slug' => 'flutterflow',
                'category' => 'Mobile',
                'icon' => 'flutterflow',
                'description' => 'Visual development platform for Flutter applications.',
                'is_active' => true,
            ],

            // Databases
            [
                'name' => 'PostgreSQL',
                'slug' => 'postgresql',
                'category' => 'Database',
                'icon' => 'postgresql',
                'description' => 'Relational database management system.',
                'is_active' => true,
            ],
            [
                'name' => 'MySQL',
                'slug' => 'mysql',
                'category' => 'Database',
                'icon' => 'mysql',
                'description' => 'Relational database management system.',
                'is_active' => true,
            ],
            [
                'name' => 'SQLite',
                'slug' => 'sqlite',
                'category' => 'Database',
                'icon' => 'sqlite',
                'description' => 'Lightweight embedded relational database.',
                'is_active' => true,
            ],
            [
                'name' => 'MongoDB',
                'slug' => 'mongodb',
                'category' => 'Database',
                'icon' => 'mongodb',
                'description' => 'Document-oriented NoSQL database.',
                'is_active' => true,
            ],

            // Backend as a Service
            [
                'name' => 'Supabase',
                'slug' => 'supabase',
                'category' => 'BaaS',
                'icon' => 'supabase',
                'description' => 'Backend platform providing database, authentication, storage and APIs.',
                'is_active' => true,
            ],

            // Tools
            [
                'name' => 'Git',
                'slug' => 'git',
                'category' => 'Tools',
                'icon' => 'git',
                'description' => 'Distributed version control system.',
                'is_active' => true,
            ],
            [
                'name' => 'GitHub',
                'slug' => 'github',
                'category' => 'Tools',
                'icon' => 'github',
                'description' => 'Platform for source code hosting and collaboration.',
                'is_active' => true,
            ],
        ];

        foreach ($technologies as $technology) {
            Technology::updateOrCreate(
                ['slug' => $technology['slug']],
                $technology
            );
        }
    }
}