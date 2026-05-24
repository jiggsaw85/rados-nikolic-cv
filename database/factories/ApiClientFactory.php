<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\ApiTokenAbility;
use App\Models\ApiClient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

final class ApiClientFactory extends Factory
{
    protected $model = ApiClient::class;

    public function definition(): array
    {
        return [
            'name' => fake()->company() . ' Client',
            'client_id' => fake()->unique()->slug(2),
            'secret_hash' => Hash::make('password'),
            'abilities' => [
                ApiTokenAbility::CvRead->value,
            ],
            'is_active' => true,
            'last_used_at' => null,
        ];
    }

    public function withSecret(string $secret): static
    {
        return $this->state([
            'secret_hash' => Hash::make($secret),
        ]);
    }

    public function inactive(): static
    {
        return $this->state([
            'is_active' => false,
        ]);
    }

    public function withAbilities(array $abilities): static
    {
        return $this->state([
            'abilities' => $abilities,
        ]);
    }
}
