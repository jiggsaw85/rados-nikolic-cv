<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\KnowledgeResource;
use Illuminate\Database\Seeder;

final class CvKnowledgeResourceSeeder extends Seeder
{
    public function run(): void
    {
        $resources = [
            [
                'title' => 'React Course for Beginners',
                'slug' => 'react-course-for-beginners',
                'type' => 'Course',
                'status' => 'completed',
                'description' => 'Comprehensive one-month React.js course with detailed code examples, projects and presentations, organized online for two consecutive years with the support of BlueGrid.',
                'url' => null,
                'pages_count' => null,
                'audience' => 'Beginner React.js developers',
                'highlights' => [
                    'One-month React.js course',
                    '20+ students per year',
                    'Organized for two consecutive years',
                    'Recorded sessions available as proof of structure and content',
                ],
                'sort_order' => 10,
            ],
            [
                'title' => 'React.js Beginner PDF Book',
                'slug' => 'react-js-beginner-pdf-book',
                'type' => 'Book',
                'status' => 'completed',
                'description' => 'A 91-page PDF book designed for beginners to learn React and best practices through real-world projects.',
                'url' => null,
                'pages_count' => 91,
                'audience' => 'Beginner React.js developers',
                'highlights' => [
                    '91 pages',
                    'Project-based learning approach',
                    'Shared with course participants',
                    'Positive feedback from students',
                ],
                'sort_order' => 20,
            ],
            [
                'title' => 'Web Artisan',
                'slug' => 'web-artisan',
                'type' => 'Book',
                'status' => 'in_progress',
                'description' => 'PDF book focused on Laravel and REST API development, using a hands-on approach through creation of a real API-based project.',
                'url' => null,
                'pages_count' => 117,
                'audience' => 'Laravel and REST API developers',
                'highlights' => [
                    'Laravel and REST API development',
                    'Hands-on real project approach',
                    'Currently on page 117',
                    'Estimated around 250 pages',
                    'Includes best practices from professional experience',
                ],
                'sort_order' => 30,
            ],
        ];

        foreach ($resources as $resource) {
            KnowledgeResource::query()->updateOrCreate(
                [
                    'slug' => $resource['slug'],
                ],
                $resource,
            );
        }
    }
}
