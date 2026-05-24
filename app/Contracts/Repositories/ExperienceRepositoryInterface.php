<?php

declare(strict_types=1);

namespace App\Contracts\Repositories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Collection;

interface ExperienceRepositoryInterface
{
    public function getAll(array $filters = []): Collection;

    public function findByIdOrFail(int $id): Experience;
}
