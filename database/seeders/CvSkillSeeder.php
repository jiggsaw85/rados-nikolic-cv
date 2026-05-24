<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

final class CvSkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['Backend', 'PHP', 98, true, 10],
            ['Backend', 'Laravel', 96, true, 20],
            ['Backend', 'Symfony', 94, true, 30],
            ['Frontend', 'React.js', 94, true, 40],
            ['Frontend', 'Vue.js', 90, true, 50],
            ['Frontend', 'Next.js', 85, true, 60],
            ['Frontend', 'HTML', 95, false, 70],
            ['Frontend', 'CSS', 95, false, 80],
            ['Frontend', 'Bootstrap', 92, false, 90],
            ['Mobile', 'React Native', 88, true, 100],
            ['Database', 'MySQL', 92, true, 110],
            ['Database', 'PostgreSQL', 88, false, 120],
            ['Database', 'MongoDB', 82, false, 130],
            ['Infrastructure', 'Redis', 82, false, 140],
            ['Infrastructure', 'Docker', 86, true, 150],
            ['Infrastructure', 'Git', 92, true, 160],
            ['Infrastructure', 'Linux VPS Administration', 88, false, 170],
            ['CMS & E-commerce', 'WordPress', 94, true, 180],
            ['CMS & E-commerce', 'WooCommerce', 90, false, 190],
            ['CMS & E-commerce', 'Magento', 86, false, 200],
            ['CMS & E-commerce', 'eZ Publish', 78, false, 210],
            ['Game Development', 'Unreal Engine', 78, true, 220],
            ['Game Development', 'C++', 74, true, 230],
        ];

        foreach ($skills as [$category, $name, $proficiency, $isFeatured, $sortOrder]) {
            Skill::query()->updateOrCreate(
                [
                    'category' => $category,
                    'name' => $name,
                ],
                [
                    'proficiency' => $proficiency,
                    'is_featured' => $isFeatured,
                    'sort_order' => $sortOrder,
                ],
            );
        }
    }
}
