<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'role',
        'employment_type',
        'location',
        'start_date',
        'end_date',
        'is_current',
        'summary',
        'responsibilities',
        'technologies',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'is_current' => 'boolean',
            'responsibilities' => 'array',
            'technologies' => 'array',
            'sort_order' => 'integer',
        ];
    }
}
