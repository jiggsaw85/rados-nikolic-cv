<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\ApiClientRepositoryInterface;
use App\Models\ApiClient;

final class ApiClientRepository implements ApiClientRepositoryInterface
{
    public function findActiveByClientId(string $clientId): ?ApiClient
    {
        return ApiClient::query()
            ->where('client_id', strtolower(trim($clientId)))
            ->where('is_active', true)
            ->first();
    }

    public function updateLastUsedAt(ApiClient $apiClient): void
    {
        $apiClient->forceFill([
            'last_used_at' => now(),
        ])->save();
    }
}
