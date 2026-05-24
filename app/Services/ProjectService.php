<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Repositories\ProjectRepositoryInterface;
use App\Contracts\Services\ProjectServiceInterface;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

final readonly class ProjectService implements ProjectServiceInterface
{
    public function __construct(
        private ProjectRepositoryInterface $projectRepository,
    ) {
    }

    public function getProjects(array $filters = []): Collection
    {
        return $this->projectRepository->getAll($filters);
    }

    public function getProject(string $identifier): Project
    {
        return $this->projectRepository->findByIdentifierOrFail($identifier);
    }
}
