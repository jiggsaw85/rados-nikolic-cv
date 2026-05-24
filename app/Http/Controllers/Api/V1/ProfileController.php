<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Contracts\Services\ProfileServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Profile\ShowProfileRequest;
use App\Http\Resources\Api\V1\ProfileResource;

final class ProfileController extends Controller
{
    public function __construct(
        private readonly ProfileServiceInterface $profileService,
    ) {
    }

    public function __invoke(ShowProfileRequest $request): ProfileResource
    {
        return new ProfileResource($this->profileService->getProfile());
    }
}
