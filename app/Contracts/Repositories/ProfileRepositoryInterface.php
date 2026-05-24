<?php

declare(strict_types=1);

namespace App\Contracts\Repositories;

use App\Models\Profile;

interface ProfileRepositoryInterface
{
    public function getProfile(): Profile;
}
