<?php

declare(strict_types=1);

namespace App\Contracts\Repositories;

use App\Models\ApiClient;

interface ApiClientRepositoryInterface
{
    public function findActiveByClientId(string $clientId): ?ApiClient;

    public function updateLastUsedAt(ApiClient $apiClient): void;
}
