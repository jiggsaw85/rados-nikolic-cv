<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\SkillRepositoryInterface;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;

final class SkillRepository implements SkillRepositoryInterface
{
    public function getAll(array $filters = []): Collection
    {
        return Skill::query()
            ->when($filters['category'] ?? null, static function ($query, string $category): void {
                $query->where('category', $category);
            })
            ->when(array_key_exists('featured', $filters), function ($query) use ($filters): void {
                $query->where('is_featured', $this->toBoolean($filters['featured']));
            })
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();
    }

    private function toBoolean(mixed $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
}
