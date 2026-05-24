<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\CertificationRepositoryInterface;
use App\Models\Certification;
use Illuminate\Database\Eloquent\Collection;

final class CertificationRepository implements CertificationRepositoryInterface
{
    public function getAll(): Collection
    {
        return Certification::query()
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();
    }
}
