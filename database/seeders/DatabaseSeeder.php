<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ApiClientSeeder::class,
            CvProfileSeeder::class,
            CvSkillSeeder::class,
            CvExperienceSeeder::class,
            CvProjectSeeder::class,
            CvEducationSeeder::class,
            CvCertificationSeeder::class,
            CvKnowledgeResourceSeeder::class,
        ]);
    }
}
