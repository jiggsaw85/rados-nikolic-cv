<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

final class CvExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            [
                'company' => 'Maksimer',
                'role' => 'Full Stack Developer',
                'employment_type' => 'Full Time',
                'location' => 'Belgrade, Serbia',
                'start_date' => '2024-10-01',
                'end_date' => null,
                'is_current' => true,
                'summary' => 'Building WordPress themes, plugins, custom blocks and internal tools.',
                'responsibilities' => [
                    'Build WordPress themes, plugins and custom blocks',
                    'Build WordPress blocks by using React.js',
                    'Build small internal web application in Next.js for hosting price calculations',
                ],
                'technologies' => [
                    'PHP',
                    'WordPress',
                    'React.js',
                    'Next.js',
                    'JavaScript',
                    'SCSS',
                ],
                'sort_order' => 10,
            ],
            [
                'company' => 'Horns',
                'role' => 'Game Developer',
                'employment_type' => 'Personal Project',
                'location' => 'Remote',
                'start_date' => null,
                'end_date' => null,
                'is_current' => true,
                'summary' => 'Personal PC video game project focused on Unreal Engine and C++ development.',
                'responsibilities' => [
                    'Develop gameplay systems in Unreal Engine',
                    'Work with C++ gameplay logic',
                    'Prepare the project for Steam presentation',
                ],
                'technologies' => [
                    'Unreal Engine',
                    'C++',
                    'Blueprints',
                    'Steam',
                ],
                'sort_order' => 20,
            ],
            [
                'company' => 'BlueGrid DOO',
                'role' => 'Full Stack Developer',
                'employment_type' => 'Full Time',
                'location' => 'Belgrade, Serbia',
                'start_date' => '2020-08-01',
                'end_date' => '2024-09-01',
                'is_current' => false,
                'summary' => 'Built web and mobile applications using Laravel API with React.js, Vue.js and React Native, while leading an internal development team.',
                'responsibilities' => [
                    'Build web applications by using Laravel API and React.js',
                    'Build web applications by using Laravel API and Vue.js',
                    'Build mobile applications by using Laravel API and React Native',
                    'Become a team leader of an internal development team of 6 people',
                ],
                'technologies' => [
                    'PHP',
                    'Laravel',
                    'React.js',
                    'Vue.js',
                    'React Native',
                    'MySQL',
                    'Docker',
                    'Git',
                ],
                'sort_order' => 30,
            ],
            [
                'company' => 'StuntCoders',
                'role' => 'Full Stack Developer',
                'employment_type' => 'Full Time',
                'location' => 'Belgrade, Serbia',
                'start_date' => '2020-02-01',
                'end_date' => '2020-08-01',
                'is_current' => false,
                'summary' => 'Worked on Magento themes, Magento modules and an existing Ruby on Rails application.',
                'responsibilities' => [
                    'Build and adapt Magento themes',
                    'Build Magento modules',
                    'Adapt an existing application made in Ruby on Rails',
                ],
                'technologies' => [
                    'PHP',
                    'Magento',
                    'Ruby on Rails',
                    'HTML',
                    'CSS',
                    'JavaScript',
                ],
                'sort_order' => 40,
            ],
            [
                'company' => 'Zwebb DOO',
                'role' => 'Full Stack Developer',
                'employment_type' => 'Full Time',
                'location' => 'Kraljevo, Serbia',
                'start_date' => '2013-01-01',
                'end_date' => '2020-01-01',
                'is_current' => false,
                'summary' => 'Started as Linux Server Administrator and frontend developer, then became team leader for Symfony, React.js, Vue.js and React Native projects.',
                'responsibilities' => [
                    'Handle and monitor 30+ VPS servers',
                    'Work on WordPress and eZ Publish CMS projects',
                    'Lead a small team of 4 developers on Symfony PHP and React.js projects',
                    'Build web applications with Symfony API and Vue.js',
                    'Work on fintech projects made in Symfony Framework',
                    'Build React Native mobile apps served by Symfony API',
                ],
                'technologies' => [
                    'PHP',
                    'Symfony',
                    'React.js',
                    'Vue.js',
                    'React Native',
                    'WordPress',
                    'eZ Publish',
                    'Linux',
                    'MySQL',
                ],
                'sort_order' => 50,
            ],
            [
                'company' => 'GuitarZoom',
                'role' => 'WordPress Developer',
                'employment_type' => 'Contract',
                'location' => 'USA',
                'start_date' => '2012-12-01',
                'end_date' => '2013-01-01',
                'is_current' => false,
                'summary' => 'Worked on a large WordPress and WooCommerce webshop.',
                'responsibilities' => [
                    'Adapt WordPress theme pages',
                    'Build new WordPress plugins',
                    'Adapt WooCommerce pages and functionalities',
                ],
                'technologies' => [
                    'PHP',
                    'WordPress',
                    'WooCommerce',
                    'HTML',
                    'CSS',
                    'JavaScript',
                ],
                'sort_order' => 60,
            ],
            [
                'company' => 'Affect3D',
                'role' => 'Magento Developer',
                'employment_type' => 'Contract',
                'location' => 'Australia',
                'start_date' => '2011-10-01',
                'end_date' => '2012-12-01',
                'is_current' => false,
                'summary' => 'Worked on an existing large Magento webshop.',
                'responsibilities' => [
                    'Work on an existing massive webshop made in Magento',
                    'Adapt shop theme pages',
                    'Adapt Magento modules',
                ],
                'technologies' => [
                    'PHP',
                    'Magento',
                    'HTML',
                    'CSS',
                    'JavaScript',
                    'MySQL',
                ],
                'sort_order' => 70,
            ],
            [
                'company' => 'Freelancer.com',
                'role' => 'Full Stack Developer',
                'employment_type' => 'Freelance',
                'location' => 'Remote',
                'start_date' => '2009-06-01',
                'end_date' => '2011-10-01',
                'is_current' => false,
                'summary' => 'Started professional career as a freelance web developer, mostly focused on WordPress, Symfony, real-estate applications and Linux scripts.',
                'responsibilities' => [
                    'Build WordPress themes from scratch following design images',
                    'Adapt existing WordPress themes',
                    'Build WordPress plugins and adapt existing WordPress plugins',
                    'Build real-estate web application with Symfony Framework',
                    'Build server and Linux scripts for backups and deployment',
                ],
                'technologies' => [
                    'PHP',
                    'WordPress',
                    'Symfony',
                    'Linux',
                    'HTML',
                    'CSS',
                    'JavaScript',
                    'MySQL',
                ],
                'sort_order' => 80,
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::query()->updateOrCreate(
                [
                    'company' => $experience['company'],
                    'role' => $experience['role'],
                    'sort_order' => $experience['sort_order'],
                ],
                $experience,
            );
        }
    }
}
