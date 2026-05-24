<?php

use App\Http\Controllers\Api\V1\Auth\TokenController;
use App\Http\Controllers\Api\V1\EducationController;
use App\Http\Controllers\Api\V1\ExperienceController;
use App\Http\Controllers\Api\V1\KnowledgeResourceController;
use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\V1\ProjectController;
use App\Http\Controllers\Api\V1\SkillController;
use App\Http\Controllers\Api\V1\SummaryController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->name('api.v1.')
    ->group(function (): void {
        Route::post('/auth/token', [TokenController::class, 'store'])
            ->name('auth.token');

        Route::middleware(['auth:sanctum', 'abilities:cv:read'])->group(function (): void {
            Route::delete('/auth/revoke', [TokenController::class, 'destroy'])
                ->name('auth.revoke');

            Route::get('/profile', ProfileController::class)->name('profile.show');
            Route::get('/summary', SummaryController::class)->name('summary.show');

            Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');

            Route::get('/experiences', [ExperienceController::class, 'index'])->name('experiences.index');
            Route::get('/experiences/{experience}', [ExperienceController::class, 'show'])->name('experiences.show');

            Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
            Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

            Route::get('/education', [EducationController::class, 'index'])->name('education.index');
            Route::get('/knowledge-resources', [KnowledgeResourceController::class, 'index'])->name('knowledge-resources.index');
        });
    });
