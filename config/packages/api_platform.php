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

$container->loadFromExtension('api_platform', [
    'mapping' => [
        'paths' => ['%kernel.project_dir%/src/Entity'],
    ],
    'patch_formats' => [
        'json' => ['application/merge-patch+json'],
    ],
    'swagger' => [
        'versions' => [3],
    ],
    'collection' => [
        'pagination' => [
            'client_items_per_page' => true,
            'items_per_page_parameter_name' => 'perPage'
        ]
    ]
]);
