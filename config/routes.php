<?php

use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes, KernelInterface $kernel) {
    $routes->import('../src/Kernel.php', 'annotation');
    $routes->import('.', 'api_platform')->prefix('/api');
    
    if ('dev' === $kernel->getEnvironment()) {
        $routes->import('@FrameworkBundle/Resources/config/routing/errors.xml')->prefix('/_error');
    }
};
