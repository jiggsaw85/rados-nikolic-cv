<?php

declare(strict_types=1);

namespace Tests\Feature\Api\V1\Auth;

use App\Enums\ApiTokenAbility;
use App\Models\ApiClient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class RevokeTokenTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function current_access_token_can_be_revoked(): void
    {
        $client = ApiClient::factory()->create();

        $newAccessToken = $client->createToken('feature-test', [
            ApiTokenAbility::CvRead->value,
        ]);

        $plainTextToken = $newAccessToken->plainTextToken;
        $tokenId = $newAccessToken->accessToken->id;

        $this->assertDatabaseHas('personal_access_tokens', [
            'id' => $tokenId,
            'tokenable_type' => ApiClient::class,
            'tokenable_id' => $client->id,
        ]);

        $response = $this
            ->withHeader('Authorization', 'Bearer ' . $plainTextToken)
            ->deleteJson('/api/v1/auth/revoke');

        $response->assertNoContent();

        $this->assertDatabaseMissing('personal_access_tokens', [
            'id' => $tokenId,
        ]);
    }

    #[Test]
    public function unauthenticated_revoke_request_is_rejected(): void
    {
        $response = $this->deleteJson('/api/v1/auth/revoke');

        $response->assertUnauthorized();
    }

    #[Test]
    public function token_without_required_ability_is_rejected(): void
    {
        $client = ApiClient::factory()->create();

        $newAccessToken = $client->createToken('feature-test', [
            'other:ability',
        ]);

        $plainTextToken = $newAccessToken->plainTextToken;
        $tokenId = $newAccessToken->accessToken->id;

        $response = $this
            ->withHeader('Authorization', 'Bearer ' . $plainTextToken)
            ->deleteJson('/api/v1/auth/revoke');

        $response->assertForbidden();

        $this->assertDatabaseHas('personal_access_tokens', [
            'id' => $tokenId,
        ]);
    }

    #[Test]
    public function token_issued_by_auth_endpoint_can_be_revoked(): void
    {
        ApiClient::factory()
            ->withSecret('valid-secret')
            ->create([
                'client_id' => 'portfolio-web',
                'abilities' => [
                    ApiTokenAbility::CvRead->value,
                ],
            ]);

        $tokenResponse = $this->postJson('/api/v1/auth/token', [
            'client_id' => 'portfolio-web',
            'client_secret' => 'valid-secret',
            'device_name' => 'feature-test',
        ]);

        $tokenResponse->assertCreated();

        $accessToken = $tokenResponse->json('data.access_token');

        $response = $this
            ->withHeader('Authorization', 'Bearer ' . $accessToken)
            ->deleteJson('/api/v1/auth/revoke');

        $response->assertNoContent();

        $this->assertDatabaseCount('personal_access_tokens', 0);
    }
}
