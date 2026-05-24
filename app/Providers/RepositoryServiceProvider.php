<?php

declare(strict_types=1);

namespace App\Providers;

use App\Contracts\Repositories\ApiClientRepositoryInterface;
use App\Contracts\Repositories\CertificationRepositoryInterface;
use App\Contracts\Repositories\EducationRepositoryInterface;
use App\Contracts\Repositories\ExperienceRepositoryInterface;
use App\Contracts\Repositories\KnowledgeResourceRepositoryInterface;
use App\Contracts\Repositories\ProfileRepositoryInterface;
use App\Contracts\Repositories\ProjectRepositoryInterface;
use App\Contracts\Repositories\SkillRepositoryInterface;
use App\Repositories\Eloquent\ApiClientRepository;
use App\Repositories\Eloquent\CertificationRepository;
use App\Repositories\Eloquent\EducationRepository;
use App\Repositories\Eloquent\ExperienceRepository;
use App\Repositories\Eloquent\KnowledgeResourceRepository;
use App\Repositories\Eloquent\ProfileRepository;
use App\Repositories\Eloquent\ProjectRepository;
use App\Repositories\Eloquent\SkillRepository;
use Illuminate\Support\ServiceProvider;

final class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ApiClientRepositoryInterface::class, ApiClientRepository::class);
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
        $this->app->bind(SkillRepositoryInterface::class, SkillRepository::class);
        $this->app->bind(ExperienceRepositoryInterface::class, ExperienceRepository::class);
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(EducationRepositoryInterface::class, EducationRepository::class);
        $this->app->bind(CertificationRepositoryInterface::class, CertificationRepository::class);
        $this->app->bind(KnowledgeResourceRepositoryInterface::class, KnowledgeResourceRepository::class);
    }
}
