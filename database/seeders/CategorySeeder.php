<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Web Applications',
                'slug' => 'web-applications',
                'description' => 'Modern web applications designed and developed by OBA TECH.',
                'icon' => 'globe',
                'is_active' => true,
            ],
            [
                'name' => 'Mobile Applications',
                'slug' => 'mobile-applications',
                'description' => 'Mobile applications for Android and iOS.',
                'icon' => 'smartphone',
                'is_active' => true,
            ],
            [
                'name' => 'Desktop Applications',
                'slug' => 'desktop-applications',
                'description' => 'Custom desktop software solutions.',
                'icon' => 'monitor',
                'is_active' => true,
            ],
            [
                'name' => 'Custom Software',
                'slug' => 'custom-software',
                'description' => 'Tailored software solutions developed according to specific business needs.',
                'icon' => 'code',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}