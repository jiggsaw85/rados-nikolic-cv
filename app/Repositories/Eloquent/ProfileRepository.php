<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\ProfileRepositoryInterface;
use App\Models\Profile;

final class ProfileRepository implements ProfileRepositoryInterface
{
    public function getProfile(): Profile
    {
        return Profile::query()->firstOrFail();
    }
}
