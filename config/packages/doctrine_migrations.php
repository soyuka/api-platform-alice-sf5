<?php

$container->loadFromExtension('doctrine_migrations', [
    'migrations_paths' => ['DoctrineMigrations' => '%kernel.project_dir%/migrations']
]);
