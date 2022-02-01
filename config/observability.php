<?php
declare(strict_types=1);
return [
    'trace' => [
        'sample' => [
            'rate' => env('TELEMETRY_SAMPLE_RATE', 1.0) // 0.1 = 10% 1.0 = 100%
        ],
        'exporters' => [
            'default' => [
                'contributor' => env('TELEMETRY_EXPORTER', 'stdout')
            ],
            'contributors' => [
                'jaeger' => [
                    "url" => env('JAEGER_URL', "http://0.0.0.0:9412/api/v2/spans")
                ],
                'stdout' => null
            ]
        ],
    ],
];