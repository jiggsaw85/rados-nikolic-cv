<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\ProjectRepositoryInterface;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

final class ProjectRepository implements ProjectRepositoryInterface
{
    public function getAll(array $filters = []): Collection
    {
        $query = Project::query()
            ->where('is_active', true)
            ->when($filters['type'] ?? null, static function ($query, string $type): void {
                $query->where('type', $type);
            })
            ->when($filters['technology'] ?? null, static function ($query, string $technology): void {
                $query->whereJsonContains('technologies', $technology);
            })
            ->when(array_key_exists('featured', $filters), function ($query) use ($filters): void {
                $query->where('is_featured', $this->toBoolean($filters['featured']));
            })
            ->orderBy('sort_order')
            ->orderBy('name');

        if (isset($filters['limit'])) {
            $query->limit((int) $filters['limit']);
        }

        return $query->get();
    }

    public function findByIdentifierOrFail(string $identifier): Project
    {
        return Project::query()
            ->where('is_active', true)
            ->when(
                is_numeric($identifier),
                static fn ($query) => $query->whereKey((int) $identifier),
                static fn ($query) => $query->where('slug', $identifier),
            )
            ->firstOrFail();
    }

    private function toBoolean(mixed $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
}
