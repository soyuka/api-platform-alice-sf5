<?php

$container->loadFromExtension('doctrine', [
    'dbal' => ['url' => '%env(resolve:DATABASE_URL)%'],
    'orm' => [
        'auto_generate_proxy_classes' => true,
        'naming_strategy'=> 'doctrine.orm.naming_strategy.underscore_number_aware',
        'auto_mapping' => true,
        'mappings' => [
            'App' => [
                'is_bundle' => false,
                'type' => 'annotation',
                'dir' => '%kernel.project_dir%/src/Entity',
                'prefix' => 'App\Entity',
                'alias' => 'App'
            ]
        ]
    ]
]);
