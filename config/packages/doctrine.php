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
    'dbal' => ['url' => '%env(resolve:DATABASE_URL)%'],
    'orm' => [
        'auto_generate_proxy_classes' => true,
        'naming_strategy' => 'doctrine.orm.naming_strategy.underscore_number_aware',
        'auto_mapping' => true,
        'mappings' => [
            'App' => [
                'is_bundle' => false,
                'type' => 'annotation',
                'dir' => '%kernel.project_dir%/src/Entity',
                'prefix' => 'App\Entity',
                'alias' => 'App',
            ],
        ],
    ],
]);
