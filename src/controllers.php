<?php


$app->match('/', function () use ($app) {
    return "hello";
})->bind('homepage');

$app->mount('/api/v1/administrations/', include __DIR__ . '/api/administrationsController.php');
$app->mount('/api/v1/contact/', include __DIR__ . '/api/contactController.php');
$app->mount('/api/v1/favoris/', include __DIR__ . '/api/favorisController.php');
$app->mount('/api/v1/gardiens/', include __DIR__ . '/api/gardiensController.php');
$app->mount('/api/v1/parkings/', include __DIR__ . '/api/parkingsController.php');
$app->mount('/api/v1/places/', include __DIR__ . '/api/placesController.php');
$app->mount('/api/v1/responsables/', include __DIR__ . '/api/responsablesController.php');
$app->mount('/api/v1/user/', include __DIR__ . '/api/UtilisateurController.php');
$app->mount('/api/v1/voitures/', include __DIR__ . '/api/voituresController.php');
$app->mount('/api/v1/reservations/', include __DIR__ . '/api/reservationsController.php');
$app->mount('/api/v1/appel/', include __DIR__ . '/api/appelController.php');

return $app;
