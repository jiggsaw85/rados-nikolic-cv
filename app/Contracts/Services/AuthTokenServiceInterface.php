<?php

declare(strict_types=1);

namespace App\Contracts\Services;

use App\Data\Auth\IssuedAccessTokenData;
use App\Models\ApiClient;

interface AuthTokenServiceInterface
{
    public function issueToken(array $credentials): IssuedAccessTokenData;

    public function revokeCurrentToken(ApiClient $apiClient): void;
}
