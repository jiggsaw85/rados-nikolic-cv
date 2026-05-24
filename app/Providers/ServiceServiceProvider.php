<?php

declare(strict_types=1);

namespace App\Providers;

use App\Contracts\Services\AuthTokenServiceInterface;
use App\Contracts\Services\EducationServiceInterface;
use App\Contracts\Services\ExperienceServiceInterface;
use App\Contracts\Services\KnowledgeResourceServiceInterface;
use App\Contracts\Services\ProfileServiceInterface;
use App\Contracts\Services\ProjectServiceInterface;
use App\Contracts\Services\SkillServiceInterface;
use App\Contracts\Services\SummaryServiceInterface;
use App\Services\AuthTokenService;
use App\Services\EducationService;
use App\Services\ExperienceService;
use App\Services\KnowledgeResourceService;
use App\Services\ProfileService;
use App\Services\ProjectService;
use App\Services\SkillService;
use App\Services\SummaryService;
use Illuminate\Support\ServiceProvider;

final class ServiceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AuthTokenServiceInterface::class, AuthTokenService::class);
        $this->app->bind(ProfileServiceInterface::class, ProfileService::class);
        $this->app->bind(SummaryServiceInterface::class, SummaryService::class);
        $this->app->bind(SkillServiceInterface::class, SkillService::class);
        $this->app->bind(ExperienceServiceInterface::class, ExperienceService::class);
        $this->app->bind(ProjectServiceInterface::class, ProjectService::class);
        $this->app->bind(EducationServiceInterface::class, EducationService::class);
        $this->app->bind(KnowledgeResourceServiceInterface::class, KnowledgeResourceService::class);
    }
}
