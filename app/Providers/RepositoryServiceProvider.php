<?php

declare(strict_types=1);

namespace App\Providers;

use App\Contracts\Repositories\ApiClientRepositoryInterface;
use App\Repositories\Eloquent\ApiClientRepository;
use Illuminate\Support\ServiceProvider;

final class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ApiClientRepositoryInterface::class,
            ApiClientRepository::class,
        );
    }
}
