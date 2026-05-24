<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Repositories\SkillRepositoryInterface;
use App\Contracts\Services\SkillServiceInterface;
use Illuminate\Database\Eloquent\Collection;

final readonly class SkillService implements SkillServiceInterface
{
    public function __construct(
        private SkillRepositoryInterface $skillRepository,
    ) {
    }

    public function getSkills(array $filters = []): Collection
    {
        return $this->skillRepository->getAll($filters);
    }
}
