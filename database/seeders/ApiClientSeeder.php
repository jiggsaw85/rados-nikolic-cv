<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\ApiTokenAbility;
use App\Models\ApiClient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

final class ApiClientSeeder extends Seeder
{
    public function run(): void
    {
        ApiClient::query()->updateOrCreate(
            [
                'client_id' => (string) config('cv-api.demo_client.id'),
            ],
            [
                'name' => 'Portfolio Web Client',
                'secret_hash' => Hash::make((string) config('cv-api.demo_client.secret')),
                'abilities' => [
                    ApiTokenAbility::CvRead->value,
                ],
                'is_active' => true,
            ],
        );
    }
}
