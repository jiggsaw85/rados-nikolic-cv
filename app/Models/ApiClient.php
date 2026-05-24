<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

final class ApiClient extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;

    protected $fillable = [
        'name',
        'client_id',
        'secret_hash',
        'abilities',
        'is_active',
        'last_used_at',
    ];

    protected $hidden = [
        'secret_hash',
    ];

    protected function casts(): array
    {
        return [
            'abilities' => 'array',
            'is_active' => 'boolean',
            'last_used_at' => 'datetime',
        ];
    }

    protected function clientId(): Attribute
    {
        return Attribute::make(
            set: static fn (string $value): string => strtolower(trim($value)),
        );
    }
}
