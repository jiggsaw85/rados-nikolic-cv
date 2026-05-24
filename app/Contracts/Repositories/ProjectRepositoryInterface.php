<?php

declare(strict_types=1);

namespace App\Contracts\Repositories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

interface ProjectRepositoryInterface
{
    public function getAll(array $filters = []): Collection;

    public function findByIdentifierOrFail(string $identifier): Project;
}
