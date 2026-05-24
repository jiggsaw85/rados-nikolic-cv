<?php

declare(strict_types=1);

namespace App\Contracts\Services;

use Illuminate\Database\Eloquent\Collection;

interface KnowledgeResourceServiceInterface
{
    public function getKnowledgeResources(array $filters = []): Collection;
}
