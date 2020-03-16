<?php

require_once __DIR__ . '/../vendor/autoload.php';

Symfony\Component\Debug\Debug::enable();

$app = new Silex\Application();
require __DIR__ . '/../src/app.php'; // ouwel 7aja tester midlware fi laravel 9bal ay requéte bch tasti droit d'accée 

require __DIR__ . '/../resources/config/dev.php';

require __DIR__ . '/../src/controllers.php';

$app->run();
