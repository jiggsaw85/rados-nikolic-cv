<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\EducationRepositoryInterface;
use App\Models\Education;
use Illuminate\Database\Eloquent\Collection;

final class EducationRepository implements EducationRepositoryInterface
{
    public function getAll(): Collection
    {
        return Education::query()
            ->orderBy('sort_order')
            ->orderByDesc('end_year')
            ->get();
    }
}
