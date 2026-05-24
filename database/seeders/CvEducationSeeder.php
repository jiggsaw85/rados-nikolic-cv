<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;

final class CvEducationSeeder extends Seeder
{
    public function run(): void
    {
        Education::query()->updateOrCreate(
            [
                'institution' => 'ETŠ Nikola Tesla',
                'program' => 'IV',
            ],
            [
                'location' => null,
                'start_year' => 2000,
                'end_year' => 2004,
                'sort_order' => 10,
            ],
        );
    }
}
