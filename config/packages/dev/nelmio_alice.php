<?php

$container->loadFromExtension('nelmio_alice', [
    'functions_blacklist' => ['current', 'shuffle', 'date', 'time', 'file', 'md5', 'sha1']
]);
