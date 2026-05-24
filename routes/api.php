<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\Auth\TokenController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->as('api.v1.')
    ->group(function (): void {
        Route::post('/auth/token', [TokenController::class, 'store'])
            ->name('auth.token');

        Route::middleware([
            'auth:sanctum',
            'abilities:cv:read',
        ])->group(function (): void {
            Route::delete('/auth/revoke', [TokenController::class, 'destroy'])
                ->name('auth.revoke');
        });
    });
