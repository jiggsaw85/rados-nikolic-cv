<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Repositories\CertificationRepositoryInterface;
use App\Contracts\Repositories\EducationRepositoryInterface;
use App\Contracts\Services\EducationServiceInterface;

final readonly class EducationService implements EducationServiceInterface
{
    public function __construct(
        private EducationRepositoryInterface $educationRepository,
        private CertificationRepositoryInterface $certificationRepository,
    ) {
    }

    public function getEducationOverview(): array
    {
        return [
            'education' => $this->educationRepository->getAll(),
            'certifications' => $this->certificationRepository->getAll(),
        ];
    }
}
