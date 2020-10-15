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

$container->loadFromExtension('web_profiler', [
    'toolbar' => true,
    'intercept_redirects' => false,
]);

$container->loadFromExtension('framework', [
    'profiler' => ['only_exceptions' => false],
]);
