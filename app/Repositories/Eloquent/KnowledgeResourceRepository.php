<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\KnowledgeResourceRepositoryInterface;
use App\Models\KnowledgeResource;
use Illuminate\Database\Eloquent\Collection;

final class KnowledgeResourceRepository implements KnowledgeResourceRepositoryInterface
{
    public function getAll(array $filters = []): Collection
    {
        return KnowledgeResource::query()
            ->when($filters['type'] ?? null, static function ($query, string $type): void {
                $query->where('type', $type);
            })
            ->when($filters['status'] ?? null, static function ($query, string $status): void {
                $query->where('status', $status);
            })
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();
    }
}
