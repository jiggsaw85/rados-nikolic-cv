<?php

declare(strict_types=1);

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface KnowledgeResourceRepositoryInterface
{
    public function getAll(array $filters = []): Collection;
}
