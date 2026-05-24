<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Repositories\ProfileRepositoryInterface;
use App\Contracts\Services\ProfileServiceInterface;
use App\Models\Profile;

final readonly class ProfileService implements ProfileServiceInterface
{
    public function __construct(
        private ProfileRepositoryInterface $profileRepository,
    ) {
    }

    public function getProfile(): Profile
    {
        return $this->profileRepository->getProfile();
    }
}
