<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Contracts\Services\EducationServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Education\IndexEducationRequest;
use App\Http\Resources\Api\V1\EducationOverviewResource;

final class EducationController extends Controller
{
    public function __construct(
        private readonly EducationServiceInterface $educationService,
    ) {
    }

    public function index(IndexEducationRequest $request): EducationOverviewResource
    {
        return new EducationOverviewResource(
            $this->educationService->getEducationOverview(),
        );
    }
}
