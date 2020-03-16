<?php
use Silex\Provider\DoctrineServiceProvider;

$app['app.params'] = array(
    'db' => array(
        'driver' => 'pdo_mysql',
        'host' => '127.0.0.1',
        'dbname' => 'pfe2',
        'user' => 'root',
        'password' => '',
    )
);


// Doctrine (db)
$app['db.options'] = array(
    'driver' => $app['app.params']['db']['driver'],
    'host' => $app['app.params']['db']['host'],
    'dbname' => $app['app.params']['db']['dbname'],
    'user' => $app['app.params']['db']['user'],
    'password' => $app['app.params']['db']['password'],
);
$app->register(new DoctrineServiceProvider(), $app['db.options']);
