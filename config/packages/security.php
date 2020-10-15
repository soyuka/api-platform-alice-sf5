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

$container->loadFromExtension('security', [
    'providers' => [
        'users_in_memory' => [
            'memory' => null,
        ],
    ],
    'firewalls' => [
        'dev' => [
            'pattern' => '^/(_(profiler|wdt)|css|images|js)/',
            'security' => false,
        ],
        'main' => [
            'anonymous' => true,
            'lazy' => true,
            'provider' => 'users_in_memory',
        ],
    ],
    'access_control' => [],
]);
