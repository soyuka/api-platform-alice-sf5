<?php

$container->loadFromExtension('framework', [
    'test' => true,
    'session' => [
        'storage_id' => 'session.storage.mock_file'
    ],
    'validation' => ['not_compromised_password' => false]
]);
