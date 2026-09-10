<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name' => 'BELGACEM YASSINE',
                'slug' => 'belgacem-yassine',
                'role' => 'Backend Developer',
                'bio' => 'Backend developer focused on building reliable, scalable and secure server-side applications and APIs.',
                'photo' => null,
                'email' => 'contact@obatech.dev',
                'linkedin_url' => null,
                'github_url' => null,
                'is_active' => true,
                'sort_order' => 1,
            ],

            [
                'name' => 'ACHACHI MOUHAMMED',
                'slug' => 'achachi-mouhammed',
                'role' => 'Full Stack Developer',
                'bio' => 'Full stack developer working across frontend and backend technologies to build complete and user-focused digital products.',
                'photo' => null,
                'email' => 'contact@obatech.dev',
                'linkedin_url' => null,
                'github_url' => null,
                'is_active' => true,
                'sort_order' => 2,
            ],

            [
                'name' => 'OUBACHIRE MOUHAMED',
                'slug' => 'oubachire-mouhamed',
                'role' => 'Mobile Developer',
                'bio' => 'Mobile developer focused on creating modern, responsive and cross-platform mobile applications.',
                'photo' => null,
                'email' => 'contact@obatech.dev',
                'linkedin_url' => null,
                'github_url' => null,
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::updateOrCreate(
                ['slug' => $member['slug']],
                $member
            );
        }
    }
}