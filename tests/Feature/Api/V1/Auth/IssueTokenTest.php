<?php

declare(strict_types=1);

namespace Tests\Feature\Api\V1\Auth;

use App\Enums\ApiTokenAbility;
use App\Models\ApiClient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class IssueTokenTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config()->set('cv-api.token_ttl_minutes', 60);
    }

    #[Test]
    public function valid_client_credentials_issue_access_token(): void
    {
        $client = ApiClient::factory()
            ->withSecret('valid-secret')
            ->create([
                'client_id' => 'portfolio-web',
                'abilities' => [
                    ApiTokenAbility::CvRead->value,
                ],
            ]);

        $response = $this->postJson('/api/v1/auth/token', [
            'client_id' => 'portfolio-web',
            'client_secret' => 'valid-secret',
            'device_name' => 'feature-test',
        ]);

        $response
            ->assertCreated()
            ->assertJsonStructure([
                'data' => [
                    'access_token',
                    'token_type',
                    'expires_at',
                    'abilities',
                ],
            ])
            ->assertJsonPath('data.token_type', 'Bearer')
            ->assertJsonPath('data.abilities.0', ApiTokenAbility::CvRead->value);

        $this->assertIsString($response->json('data.access_token'));
        $this->assertNotSame('', $response->json('data.access_token'));
        $this->assertNotNull($response->json('data.expires_at'));

        $this->assertDatabaseHas('personal_access_tokens', [
            'tokenable_type' => ApiClient::class,
            'tokenable_id' => $client->id,
            'name' => 'feature-test',
        ]);

        $this->assertNotNull($client->fresh()->last_used_at);
    }

    #[Test]
    public function invalid_client_secret_is_rejected(): void
    {
        ApiClient::factory()
            ->withSecret('correct-secret')
            ->create([
                'client_id' => 'portfolio-web',
            ]);

        $response = $this->postJson('/api/v1/auth/token', [
            'client_id' => 'portfolio-web',
            'client_secret' => 'wrong-secret',
        ]);

        $response
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'client_id',
            ]);

        $this->assertDatabaseCount('personal_access_tokens', 0);
    }

    #[Test]
    public function inactive_client_is_rejected(): void
    {
        ApiClient::factory()
            ->inactive()
            ->withSecret('valid-secret')
            ->create([
                'client_id' => 'portfolio-web',
            ]);

        $response = $this->postJson('/api/v1/auth/token', [
            'client_id' => 'portfolio-web',
            'client_secret' => 'valid-secret',
        ]);

        $response
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'client_id',
            ]);

        $this->assertDatabaseCount('personal_access_tokens', 0);
    }

    #[Test]
    public function token_request_requires_client_id_and_client_secret(): void
    {
        $response = $this->postJson('/api/v1/auth/token', []);

        $response
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'client_id',
                'client_secret',
            ]);
    }

    #[Test]
    public function device_name_is_optional(): void
    {
        $client = ApiClient::factory()
            ->withSecret('valid-secret')
            ->create([
                'client_id' => 'portfolio-web',
            ]);

        $response = $this->postJson('/api/v1/auth/token', [
            'client_id' => 'portfolio-web',
            'client_secret' => 'valid-secret',
        ]);

        $response->assertCreated();

        $this->assertDatabaseHas('personal_access_tokens', [
            'tokenable_type' => ApiClient::class,
            'tokenable_id' => $client->id,
            'name' => 'portfolio-client',
        ]);
    }
}
