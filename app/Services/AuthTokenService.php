<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Repositories\ApiClientRepositoryInterface;
use App\Contracts\Services\AuthTokenServiceInterface;
use App\Data\Auth\IssuedAccessTokenData;
use App\Enums\ApiTokenAbility;
use App\Models\ApiClient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\PersonalAccessToken;

final readonly class AuthTokenService implements AuthTokenServiceInterface
{
    public function __construct(
        private ApiClientRepositoryInterface $apiClientRepository,
    ) {
    }

    public function issueToken(array $credentials): IssuedAccessTokenData
    {
        $apiClient = $this->apiClientRepository->findActiveByClientId($credentials['client_id']);

        if (! $apiClient || ! Hash::check($credentials['client_secret'], $apiClient->secret_hash)) {
            throw ValidationException::withMessages([
                'client_id' => __('auth.failed'),
            ]);
        }

        $abilities = $apiClient->abilities ?: [
            ApiTokenAbility::CvRead->value,
        ];

        $expiresAt = now()->addMinutes((int) config('cv-api.token_ttl_minutes'));
        $deviceName = $credentials['device_name'] ?? 'portfolio-client';

        $token = $apiClient->createToken($deviceName, $abilities, $expiresAt);

        $this->apiClientRepository->updateLastUsedAt($apiClient);

        return new IssuedAccessTokenData(
            accessToken: $token->plainTextToken,
            tokenType: 'Bearer',
            expiresAt: $token->accessToken->expires_at,
            abilities: $abilities,
        );
    }

    public function revokeCurrentToken(ApiClient $apiClient): void
    {
        $accessToken = $apiClient->currentAccessToken();

        if ($accessToken instanceof PersonalAccessToken) {
            $accessToken->delete();
        }
    }
}
