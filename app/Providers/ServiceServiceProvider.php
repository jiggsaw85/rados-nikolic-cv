<?php

declare(strict_types=1);

namespace App\Providers;

use App\Contracts\Services\AuthTokenServiceInterface;
use App\Services\AuthTokenService;
use Illuminate\Support\ServiceProvider;

final class ServiceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            AuthTokenServiceInterface::class,
            AuthTokenService::class,
        );
    }
}
