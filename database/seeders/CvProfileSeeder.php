<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

final class CvProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::query()->updateOrCreate(
            [
                'email' => 'radoshnikolic@gmail.com',
            ],
            [
                'full_name' => 'Radoš Nikolić',
                'headline' => 'Full Stack Developer',
                'phone' => '+381605030862',
                'location' => 'Aleksinac, Serbia',
                'years_of_experience' => 15,
                'avatar_path' => 'assets/img/rados-nikolic-profile.png',
                'summary' => 'Full Stack Developer with 15 years of experience in PHP, Laravel, Symfony, React.js, Vue.js, React Native, WordPress, Magento, API development and team leadership.',
                'description' => 'My career began as a freelancer on freelancer.com, where I earned 20+ positive reviews, maintained a 5-star rating and built a client base with over 50% returning customers. After freelancing, I worked with IT companies in Serbia and internationally, including the USA, Australia, the Netherlands and England. My backend expertise is focused on PHP, while on the frontend I specialize in advanced JavaScript frameworks and libraries including React.js, Vue.js and React Native.',
                'links' => [
                    [
                        'label' => 'LinkedIn',
                        'url' => null,
                    ],
                    [
                        'label' => 'Freelancer profile',
                        'url' => null,
                    ],
                    [
                        'label' => 'Photagon',
                        'url' => 'https://photagon.com',
                    ],
                    [
                        'label' => 'Horns on Steam',
                        'url' => 'https://store.steampowered.com/app/4212650/Horns/',
                    ],
                ],
                'languages' => [
                    'English',
                    'Serbian',
                ],
            ],
        );
    }
}
