<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Contracts\Services\ExperienceServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Experience\IndexExperienceRequest;
use App\Http\Requests\Api\V1\Experience\ShowExperienceRequest;
use App\Http\Resources\Api\V1\ExperienceResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class ExperienceController extends Controller
{
    public function __construct(
        private readonly ExperienceServiceInterface $experienceService,
    ) {
    }

    public function index(IndexExperienceRequest $request): AnonymousResourceCollection
    {
        return ExperienceResource::collection(
            $this->experienceService->getExperiences($request->validated()),
        );
    }

    public function show(ShowExperienceRequest $request, int $experience): ExperienceResource
    {
        return new ExperienceResource(
            $this->experienceService->getExperience($experience),
        );
    }
}
