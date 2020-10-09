<?php

$container->loadFromExtension('api_platform', [
    'mapping' => [
        'paths'     => ['%kernel.project_dir%/src/Entity']
    ],
    'patch_formats' => [
        'json' => ['application/merge-patch+json']
    ],
    'swagger' => [
        'versions' => [3]
    ]
]);
