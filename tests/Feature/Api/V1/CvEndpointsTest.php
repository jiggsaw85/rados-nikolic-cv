<?php

declare(strict_types=1);

namespace Tests\Feature\Api\V1;

use App\Enums\ApiTokenAbility;
use App\Models\ApiClient;
use App\Models\Experience;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class CvEndpointsTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function protected_cv_endpoints_require_authentication(): void
    {
        $endpoints = [
            '/api/v1/profile',
            '/api/v1/summary',
            '/api/v1/skills',
            '/api/v1/experiences',
            '/api/v1/projects',
            '/api/v1/education',
            '/api/v1/knowledge-resources',
        ];

        foreach ($endpoints as $endpoint) {
            $this->getJson($endpoint)->assertUnauthorized();
        }
    }

    #[Test]
    public function protected_cv_endpoints_require_cv_read_ability(): void
    {
        $client = ApiClient::factory()->create();

        Sanctum::actingAs($client, [
            'other:ability',
        ]);

        $this->getJson('/api/v1/profile')->assertForbidden();
    }

    #[Test]
    public function profile_endpoint_returns_profile_data(): void
    {
        $this->seed();
        $this->authenticate();

        $this->getJson('/api/v1/profile')
            ->assertOk()
            ->assertJsonPath('data.full_name', 'Radoš Nikolić')
            ->assertJsonPath('data.email', 'radoshnikolic@gmail.com')
            ->assertJsonPath('data.years_of_experience', 15);
    }

    #[Test]
    public function summary_endpoint_returns_cv_overview(): void
    {
        $this->seed();
        $this->authenticate();

        $this->getJson('/api/v1/summary')
            ->assertOk()
            ->assertJsonPath('data.profile.full_name', 'Radoš Nikolić')
            ->assertJsonPath('data.totals.years_of_experience', 15)
            ->assertJsonStructure([
                'data' => [
                    'profile',
                    'totals',
                    'top_skills',
                    'latest_experiences',
                    'featured_projects',
                ],
            ]);
    }

    #[Test]
    public function skills_endpoint_returns_filtered_skills(): void
    {
        $this->seed();
        $this->authenticate();

        $this->getJson('/api/v1/skills?category=Backend')
            ->assertOk()
            ->assertJsonFragment([
                'name' => 'Laravel',
                'category' => 'Backend',
            ])
            ->assertJsonMissing([
                'name' => 'React.js',
                'category' => 'Frontend',
            ]);
    }

    #[Test]
    public function experiences_endpoint_returns_list_and_single_experience(): void
    {
        $this->seed();
        $this->authenticate();

        $this->getJson('/api/v1/experiences?technology=Laravel')
            ->assertOk()
            ->assertJsonFragment([
                'company' => 'BlueGrid DOO',
            ]);

        $experience = Experience::query()
            ->where('company', 'BlueGrid DOO')
            ->firstOrFail();

        $this->getJson("/api/v1/experiences/{$experience->id}")
            ->assertOk()
            ->assertJsonPath('data.company', 'BlueGrid DOO')
            ->assertJsonPath('data.role', 'Full Stack Developer');
    }

    #[Test]
    public function experience_show_endpoint_returns_not_found_for_missing_experience(): void
    {
        $this->seed();
        $this->authenticate();

        $this->getJson('/api/v1/experiences/999999')
            ->assertNotFound();
    }

    #[Test]
    public function projects_endpoint_returns_list_and_single_project_by_slug(): void
    {
        $this->seed();
        $this->authenticate();

        $this->getJson('/api/v1/projects?featured=true')
            ->assertOk()
            ->assertJsonFragment([
                'slug' => 'horns',
            ])
            ->assertJsonFragment([
                'slug' => 'photagon',
            ]);

        $this->getJson('/api/v1/projects/horns')
            ->assertOk()
            ->assertJsonPath('data.name', 'Horns')
            ->assertJsonPath('data.url', 'https://store.steampowered.com/app/4212650/Horns/');
    }

    #[Test]
    public function education_endpoint_returns_education_and_certifications(): void
    {
        $this->seed();
        $this->authenticate();

        $this->getJson('/api/v1/education')
            ->assertOk()
            ->assertJsonFragment([
                'institution' => 'ETŠ Nikola Tesla',
            ])
            ->assertJsonFragment([
                'name' => 'Microsoft Certified IT Professional',
            ]);
    }

    #[Test]
    public function knowledge_resources_endpoint_returns_filtered_resources(): void
    {
        $this->seed();
        $this->authenticate();

        $this->getJson('/api/v1/knowledge-resources?type=Book')
            ->assertOk()
            ->assertJsonFragment([
                'slug' => 'react-js-beginner-pdf-book',
            ])
            ->assertJsonFragment([
                'slug' => 'web-artisan',
            ])
            ->assertJsonMissing([
                'slug' => 'react-course-for-beginners',
            ]);
    }

    private function authenticate(): ApiClient
    {
        $client = ApiClient::factory()->create();

        Sanctum::actingAs($client, [
            ApiTokenAbility::CvRead->value,
        ]);

        return $client;
    }
}
