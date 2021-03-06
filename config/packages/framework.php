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
    'secret' => '%env(APP_SECRET)%',
    'session' => [
        'handler_id' => null,
        'cookie_secure' => 'auto',
        'cookie_samesite' => 'lax',
    ],
    'php_errors' => [
        'log' => true,
    ],
    'router' => ['utf8' => true],
    'validation' => [
        'email_validation_mode' => 'html5',
    ],
]);
