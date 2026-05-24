<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Education extends Model
{
    use HasFactory;

    protected $table = 'education';

    protected $fillable = [
        'institution',
        'program',
        'location',
        'start_year',
        'end_year',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'start_year' => 'integer',
            'end_year' => 'integer',
            'sort_order' => 'integer',
        ];
    }
}
