<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Entity\places;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

$place = $app['controllers_factory'];


$place->get('/', function (Application $app) {
    $places = $app['places_manager']->FetchAll();
    return new JsonResponse(array('code' => 1, 'msg' => $places));
})->bind('api_places') ;

$place->get('/{idplace}', function (Application $app, $idplace) {
    $place = $app['places_manager']->FindByID($idplace);
    return new JsonResponse(array('code' => 2, 'msg' => $place));
})->bind('api_place');


$place->post('/', function (Application $app, Request $request) {
    $id = $request->request->get('id');
    $Nom_p = $request->request->get('Nom_p');
    $Prix_p = $request->request->get('Prix_p');
    $Etat_dispo = $request->request->get('Etat_dispo');
    $Id_park = $request->request->get('Id_park');
    $place = new places($id,$Nom_p, $Prix_p, $Etat_dispo, $Id_park);
    if ($app['places_manager']->KeyPrimary($place->id) == 0) {
        $app['places_manager']->add($place);
        return new JsonResponse(array('code' => 50, 'msg' => 'ajouter avec succès'));
    } else {
        return new JsonResponse(array('code' => 51, 'msg' => 'Cette clé existe déjà'));
    }
})->bind('api_place_new');

$place->post('/{id}/m', function (Application $app, Request $request, $id) {
    $place = $app['places_manager']->FindByID($id);
    if ($place->id != null) {
        $id = $request->request->get('id');
        $Nom_p = $request->request->get('Nom_p');
        $Prix_p = $request->request->get('Prix_p');
        $Etat_dispo = $request->request->get('Etat_dispo');
        $Id_park = $request->request->get('Id_park');
        $place = new places($id,$Nom_p, $Prix_p, $Etat_dispo, $Id_park);
        $app['places_manager']->update($place);
        return new JsonResponse(array('code' => 5, 'msg' => 'Modification avec succès'));
    } else {
        return new JsonResponse(array('code' => 6, 'msg' => 'Cette clé n\'existe déjà'));
    }

})->bind('api_place_update');



$place->post('/{id}/delet', function (Application $app, $id) {
    $place = $app['places_manager']->FindByID($id);
    if ($place->id != null) {
        $app['places_manager']->Delet($place);
        return new JsonResponse(array('code' => 80, 'msg' => 'Supprimer avec succès'));

    } else {
        return new JsonResponse(array('code' => 81, 'msg' => 'Cette clé \'existe déjà'));
    }

}) ->bind('api_place_delet');

return $place;