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
$container->loadFromExtension('doctrine', [
    'orm' => ['auto_generate_proxy_classes' => false],
    'metadata_cache_driver' => [
        'type' => 'pool',
        'pool' => 'doctrine.system_cache_pool',
    ],
    'query_cache_driver' => [
        'type' => 'pool',
        'pool' => 'doctrine.system_cache_pool',
    ],
    'result_cache_driver' => [
        'type' => 'pool',
        'pool' => 'doctrine.result_cache_pool',
    ],
]);

$container->loadFromExtension('framework', [
    'cache' => ['pools' => [
        'doctrine.result_cache_pool' => ['adapter' => 'cache.app'],
        'doctrine.system_cache_pool' => ['adapter' => 'cache.system'],
    ]],
]);
