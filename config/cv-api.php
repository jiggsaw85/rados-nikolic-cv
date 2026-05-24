<?php

declare(strict_types=1);

return [
    'token_ttl_minutes' => (int) env('CV_API_TOKEN_TTL_MINUTES', 60),

    'demo_client' => [
        'id' => env('CV_API_DEMO_CLIENT_ID', 'portfolio-web'),
        'secret' => env('CV_API_DEMO_CLIENT_SECRET', 'portfolio-secret'),
    ],
];
