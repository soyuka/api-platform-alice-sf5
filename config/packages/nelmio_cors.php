<?php

$container->loadFromExtension('nelmio_cors', [
    'defaults' => [
        'origin_regex' => true,
        'allow_origin' => ['%env(CORS_ALLOW_ORIGIN)%'],
        'allow_methods' => ['GET', 'OPTIONS', 'POST', 'PUT', 'PATCH', 'DELETE'],
        'allow_headers' => ['Content-Type', 'Authorization'],
        'expose_headers' => ['Link'],
        'max_age' => 3600
    ],
    'paths' => [
        '^/' => null
    ]
]);
