<?php

declare(strict_types=1);

namespace App\Contracts\Services;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Collection;

interface ExperienceServiceInterface
{
    public function getExperiences(array $filters = []): Collection;

    public function getExperience(int $id): Experience;
}
