<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Seeder;

final class CvCertificationSeeder extends Seeder
{
    public function run(): void
    {
        $certifications = [
            [
                'name' => 'Microsoft Certified IT Professional',
                'issuer' => 'IT Center',
                'location' => 'Niš',
                'issued_at_year' => null,
                'sort_order' => 10,
            ],
            [
                'name' => 'Microsoft Certified Technology Specialist',
                'issuer' => 'IT Center',
                'location' => 'Niš',
                'issued_at_year' => null,
                'sort_order' => 20,
            ],
        ];

        foreach ($certifications as $certification) {
            Certification::query()->updateOrCreate(
                [
                    'name' => $certification['name'],
                    'issuer' => $certification['issuer'],
                ],
                $certification,
            );
        }
    }
}
