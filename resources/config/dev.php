<?php
// include the prod configuration
require __DIR__.'/prod.php';
// include config database
require __DIR__.'/params.php';
require __DIR__.'/security.php';
require __DIR__.'/controllers.php';
// enable the debug mode
$app['debug'] = true;
