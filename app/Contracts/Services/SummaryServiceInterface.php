<?php

declare(strict_types=1);

namespace App\Contracts\Services;

interface SummaryServiceInterface
{
    public function getSummary(): array;
}
