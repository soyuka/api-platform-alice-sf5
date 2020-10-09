<?php

$container->loadFromExtension('framework', [
    'secret' => '%env(APP_SECRET)%',
    'session' => [
        'handler_id' => null,
        'cookie_secure' => 'auto',
        'cookie_samesite' => 'lax',
    ],
    'php_errors' => [
        'log' => true
    ],
    'router' => ['utf8' => true],
    'validation' => [
        'email_validation_mode' => 'html5'
    ]
]);
