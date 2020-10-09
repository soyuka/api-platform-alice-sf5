<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return function (ContainerConfigurator $configurator) {
    $parameters = $configurator->parameters();

    $services = $configurator->services()
        ->defaults()
        ->autowire()
        ->autoconfigure()
    ;

    $services->load('App\\', '../src/*')
        ->exclude('../src/{DependencyInjection,Entity,Tests,Kernel.php}')
    ;
};

