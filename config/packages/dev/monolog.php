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

$container->loadFromExtension('monolog', [
    'handlers' => [
        'main' => [
            'type' => 'fingers_crossed',
            'action_level' => 'error',
            'handler' => 'nested',
            'excluded_http_codes' => [404, 405],
            'buffer_size' => 50, // How many messages should be saved? Prevent memory leaks
        ],
        'main' => [
            'type' => 'stream',
            'path' => '%kernel.logs_dir%/%kernel.environment%.log',
            'level' => 'debug',
            'channels' => ['!event'],
        ],
        'console' => [
            'type' => 'console',
            'process_psr_3_messages' => false,
            'channels' => ['!event', '!doctrine', '!console'],
        ],
    ],
]);
