<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

final class CvProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Horns',
                'slug' => 'horns',
                'type' => 'PC Video Game',
                'description' => 'Personal PC video game project built with Unreal Engine and C++, published with a public Steam page.',
                'url' => 'https://store.steampowered.com/app/4212650/Horns/',
                'repository_url' => null,
                'technologies' => [
                    'Unreal Engine',
                    'C++',
                    'Blueprints',
                    'Steam',
                ],
                'highlights' => [
                    'Personal game development project',
                    'Unreal Engine and C++ workflow',
                    'Public Steam presentation',
                ],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 10,
            ],
            [
                'name' => 'Photagon',
                'slug' => 'photagon',
                'type' => 'Social Network',
                'description' => 'Large-scale photo contest social network designed to be mobile-friendly and supported by a fully custom admin panel.',
                'url' => 'https://photagon.com',
                'repository_url' => null,
                'technologies' => [
                    'PHP',
                    'Symfony 4',
                    'HTML',
                    'CSS',
                    'jQuery',
                    'Bootstrap',
                    'MySQL',
                ],
                'highlights' => [
                    'Photo contest social network',
                    'Custom admin panel',
                    'Mobile-friendly interface',
                    'Still live online',
                ],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 20,
            ],
            [
                'name' => 'Berry Task Manager',
                'slug' => 'berry-task-manager',
                'type' => 'Task Management',
                'description' => 'Task manager inspired by Trello, Jira and Active Collab, created to simplify project and task management while keeping the most useful workflow features.',
                'url' => null,
                'repository_url' => null,
                'technologies' => [
                    'PHP',
                    'Symfony 5',
                    'HTML',
                    'CSS',
                    'jQuery',
                    'Bootstrap',
                    'MySQL',
                ],
                'highlights' => [
                    'Full personal project workflow',
                    'Task and project management features',
                    'Built as sole developer',
                ],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 30,
            ],
            [
                'name' => 'RentME',
                'slug' => 'rentme',
                'type' => 'Marketplace',
                'description' => 'Platform initially created for the Serbian market where users could create accounts and rent out or rent virtually anything.',
                'url' => null,
                'repository_url' => null,
                'technologies' => [
                    'PHP',
                    'Laravel API',
                    'React.js',
                    'MySQL',
                    'Bootstrap',
                ],
                'highlights' => [
                    'Laravel API backend',
                    'React.js frontend',
                    'User account and listing workflow',
                    'Built as sole developer',
                ],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 40,
            ],
        ];

        foreach ($projects as $project) {
            Project::query()->updateOrCreate(
                [
                    'slug' => $project['slug'],
                ],
                $project,
            );
        }
    }
}
