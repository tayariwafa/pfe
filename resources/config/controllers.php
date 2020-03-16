<?php

$app['user_manager'] = function () use ($app) {
    return new Service\UtilisateurManager($app['db']);
};

$app['voitures_manager'] = function () use ($app) {
    return new Service\voituresManager($app['db']);
};

$app['responsables_manager'] = function () use ($app) {
    return new Service\responsablesManager($app['db']);
};

$app['reservations_manager'] = function () use ($app) {
    return new Service\reservationsManager($app['db']);
};

$app['places_manager'] = function () use ($app) {
    return new Service\placesManager($app['db']);
};

$app['parkings_manager'] = function () use ($app) {
    return new Service\parkingsManager($app['db']);
};

$app['gardiens_manager'] = function () use ($app) {
    return new Service\gardiensManager($app['db']);
};

$app['favoris_manager'] = function () use ($app) {
    return new Service\favorisManager($app['db']);
};

$app['contact_manager'] = function () use ($app) {
    return new Service\contactManager($app['db']);
};

$app['administrations_manager'] = function () use ($app) {
    return new Service\administrationsManager($app['db']);
};

$app['appel_manager'] = function () use ($app) {
    return new Service\appelManager($app['db']);
};
