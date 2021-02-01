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

$container->loadFromExtension('framework', [
    'messenger' => [
        'transports' => [
            'async' => '%env(MESSENGER_TRANSPORT_DSN)%',
        ],
        'routing' => [
            'App\Dto\SomeInput' => 'async'
        ]
    ]
]);
