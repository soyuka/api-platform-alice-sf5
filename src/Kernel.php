<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    protected function configureContainer(ContainerConfigurator $container): void
    {
        if (is_file($path = \dirname(__DIR__).'/config/services.php')) {
            (require $path)($container->withPath($path), $this);
        }

        $container->import('../config/{packages}/*.php');
        $container->import('../config/{packages}/'.$this->environment.'/*.php');
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        if (is_file($path = \dirname(__DIR__).'/config/routes.php')) {
            (require $path)($routes->withPath($path), $this);
        }
    }
}
