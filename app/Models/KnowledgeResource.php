<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class KnowledgeResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'status',
        'description',
        'url',
        'pages_count',
        'audience',
        'highlights',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'pages_count' => 'integer',
            'highlights' => 'array',
            'sort_order' => 'integer',
        ];
    }
}
