<?php

$app['security.jwt'] = [
    'secret_key' => 'Very_secret_key',
    'life_time' => 10000,
    'algorithm' => ['HS256'],
    'options' => [
        'header_name' => 'X-Access-Token',
        'token_prefix' => 'Bearer',
    ]
];

$app->register(new Silex\Provider\SecurityJWTServiceProvider());