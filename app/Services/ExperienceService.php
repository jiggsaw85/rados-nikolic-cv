<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Repositories\ExperienceRepositoryInterface;
use App\Contracts\Services\ExperienceServiceInterface;
use App\Models\Experience;
use Illuminate\Database\Eloquent\Collection;

final readonly class ExperienceService implements ExperienceServiceInterface
{
    public function __construct(
        private ExperienceRepositoryInterface $experienceRepository,
    ) {
    }

    public function getExperiences(array $filters = []): Collection
    {
        return $this->experienceRepository->getAll($filters);
    }

    public function getExperience(int $id): Experience
    {
        return $this->experienceRepository->findByIdOrFail($id);
    }
}
