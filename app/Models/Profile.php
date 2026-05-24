<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'headline',
        'email',
        'phone',
        'location',
        'years_of_experience',
        'avatar_path',
        'summary',
        'description',
        'links',
        'languages',
    ];

    protected function casts(): array
    {
        return [
            'years_of_experience' => 'integer',
            'links' => 'array',
            'languages' => 'array',
        ];
    }
}
