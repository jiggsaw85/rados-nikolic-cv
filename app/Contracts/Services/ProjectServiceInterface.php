<?php

declare(strict_types=1);

namespace App\Contracts\Services;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

interface ProjectServiceInterface
{
    public function getProjects(array $filters = []): Collection;

    public function getProject(string $identifier): Project;
}
