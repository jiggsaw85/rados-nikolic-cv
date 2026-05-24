<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Repositories\KnowledgeResourceRepositoryInterface;
use App\Contracts\Services\KnowledgeResourceServiceInterface;
use Illuminate\Database\Eloquent\Collection;

final readonly class KnowledgeResourceService implements KnowledgeResourceServiceInterface
{
    public function __construct(
        private KnowledgeResourceRepositoryInterface $knowledgeResourceRepository,
    ) {
    }

    public function getKnowledgeResources(array $filters = []): Collection
    {
        return $this->knowledgeResourceRepository->getAll($filters);
    }
}
