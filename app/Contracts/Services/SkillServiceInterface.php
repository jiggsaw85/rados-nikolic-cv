<?php

declare(strict_types=1);

namespace App\Contracts\Services;

use Illuminate\Database\Eloquent\Collection;

interface SkillServiceInterface
{
    public function getSkills(array $filters = []): Collection;
}
