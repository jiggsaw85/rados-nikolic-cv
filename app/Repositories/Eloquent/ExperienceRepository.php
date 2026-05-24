<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\ExperienceRepositoryInterface;
use App\Models\Experience;
use Illuminate\Database\Eloquent\Collection;

final class ExperienceRepository implements ExperienceRepositoryInterface
{
    public function getAll(array $filters = []): Collection
    {
        $query = Experience::query()
            ->when($filters['company'] ?? null, static function ($query, string $company): void {
                $query->where('company', 'like', "%{$company}%");
            })
            ->when($filters['technology'] ?? null, static function ($query, string $technology): void {
                $query->whereJsonContains('technologies', $technology);
            })
            ->when(array_key_exists('current', $filters), function ($query) use ($filters): void {
                $query->where('is_current', $this->toBoolean($filters['current']));
            });

        match ($filters['sort'] ?? '-sort_order') {
            'sort_order' => $query->orderBy('sort_order'),
            '-sort_order' => $query->orderByDesc('sort_order'),
            'start_date' => $query->orderBy('start_date'),
            '-start_date' => $query->orderByDesc('start_date'),
            default => $query->orderByDesc('sort_order'),
        };

        if (isset($filters['limit'])) {
            $query->limit((int) $filters['limit']);
        }

        return $query->get();
    }

    public function findByIdOrFail(int $id): Experience
    {
        return Experience::query()->findOrFail($id);
    }

    private function toBoolean(mixed $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
}
