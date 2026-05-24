<?php

declare(strict_types=1);

namespace App\Data\Auth;

use Carbon\CarbonInterface;

final readonly class IssuedAccessTokenData
{
    public function __construct(
        public string $accessToken,
        public string $tokenType,
        public ?CarbonInterface $expiresAt,
        public array $abilities,
    ) {
    }
}
