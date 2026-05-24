<?php

declare(strict_types=1);

namespace App\Contracts\Services;

interface EducationServiceInterface
{
    public function getEducationOverview(): array;
}
