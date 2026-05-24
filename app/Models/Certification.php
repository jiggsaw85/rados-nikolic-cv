<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'issuer',
        'location',
        'issued_at_year',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'issued_at_year' => 'integer',
            'sort_order' => 'integer',
        ];
    }
}
