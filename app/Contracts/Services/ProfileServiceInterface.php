<?php

declare(strict_types=1);

namespace App\Contracts\Services;

use App\Models\Profile;

interface ProfileServiceInterface
{
    public function getProfile(): Profile;
}
