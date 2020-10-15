<?php

/*
 * This file is part of the API Platform By Examples project.
 *
 * (c) Antoine Bluchet <soyuka@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

$container->loadFromExtension('nelmio_cors', [
    'defaults' => [
        'origin_regex' => true,
        'allow_origin' => ['%env(CORS_ALLOW_ORIGIN)%'],
        'allow_methods' => ['GET', 'OPTIONS', 'POST', 'PUT', 'PATCH', 'DELETE'],
        'allow_headers' => ['Content-Type', 'Authorization'],
        'expose_headers' => ['Link'],
        'max_age' => 3600,
    ],
    'paths' => [
        '^/' => null,
    ],
]);
