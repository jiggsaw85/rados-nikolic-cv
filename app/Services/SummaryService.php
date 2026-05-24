<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Repositories\ExperienceRepositoryInterface;
use App\Contracts\Repositories\KnowledgeResourceRepositoryInterface;
use App\Contracts\Repositories\ProfileRepositoryInterface;
use App\Contracts\Repositories\ProjectRepositoryInterface;
use App\Contracts\Repositories\SkillRepositoryInterface;
use App\Contracts\Services\SummaryServiceInterface;

final readonly class SummaryService implements SummaryServiceInterface
{
    public function __construct(
        private ProfileRepositoryInterface $profileRepository,
        private SkillRepositoryInterface $skillRepository,
        private ExperienceRepositoryInterface $experienceRepository,
        private ProjectRepositoryInterface $projectRepository,
        private KnowledgeResourceRepositoryInterface $knowledgeResourceRepository,
    ) {
    }

    public function getSummary(): array
    {
        $profile = $this->profileRepository->getProfile();
        $skills = $this->skillRepository->getAll(['featured' => true]);
        $experiences = $this->experienceRepository->getAll(['limit' => 3]);
        $projects = $this->projectRepository->getAll(['featured' => true]);
        $knowledgeResources = $this->knowledgeResourceRepository->getAll();

        return [
            'profile' => $profile,
            'totals' => [
                'years_of_experience' => $profile->years_of_experience,
                'skills' => $skills->count(),
                'latest_experiences' => $experiences->count(),
                'featured_projects' => $projects->count(),
                'knowledge_resources' => $knowledgeResources->count(),
            ],
            'top_skills' => $skills,
            'latest_experiences' => $experiences,
            'featured_projects' => $projects,
        ];
    }
}
