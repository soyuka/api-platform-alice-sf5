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

use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes, KernelInterface $kernel): void {
    $routes->import('../src/Kernel.php', 'annotation');
    $routes->import('.', 'api_platform')->prefix('/api');

    if ('dev' === $kernel->getEnvironment()) {
        $routes->import('@FrameworkBundle/Resources/config/routing/errors.xml')->prefix('/_error');
        $routes->import('@WebProfilerBundle/Resources/config/routing/wdt.xml')->prefix('/_wdt');
        $routes->import('@WebProfilerBundle/Resources/config/routing/profiler.xml')->prefix('/_profiler');
    }
};
