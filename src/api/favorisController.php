<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Entity\favoris;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

$favori = $app['controllers_factory'];


$favori->get('/', function (Application $app) {
    $favoris = $app['favoris_manager']->FetchAll();
    return new JsonResponse(array('code' => 1, 'msg' => $favoris));
})->bind('api_favoris') ;

$favori->get('/{idfavori}', function (Application $app, $idfavori) {
    $voiture = $app['favoris_manager']->FindByID($idfavori);
    return new JsonResponse(array('code' => 2, 'msg' => $voiture));
})->bind('api_favori');



$favori->post('/', function (Application $app, Request $request) {
    $id = $request->request->get('id');
    $id_utilisateur = $request->request->get('id_utilisateur');
    $id_Parking = $request->request->get('id_Parking');
    $etat = $request->request->get('etat');
    $favoris = new favoris($id,$id_utilisateur, $id_Parking, $etat);
    if ($app['favoris_manager']->KeyPrimary($favoris->id) == 0) {
        $app['favoris_manager']->add($favoris);
        return new JsonResponse(array('code' => 50, 'msg' => 'ajouter avec succès'));
    } else {
        return new JsonResponse(array('code' => 51, 'msg' => 'Cette clé existe déjà'));
    }
})->bind('api_favoris_new');

$favori->post('/{id}/m', function (Application $app, Request $request, $id) {
    $favoris = $app['favoris_manager']->FindByID($id);
    if ($favoris->id != null) {
        $id = $request->request->get('id');
        $id_utilisateur = $request->request->get('id_utilisateur');
        $id_Parking = $request->request->get('id_Parking');
        $etat = $request->request->get('etat');
        $favoris = new favoris($id,$id_utilisateur, $id_Parking, $etat);
        $app['favoris_manager']->update($favoris);
        return new JsonResponse(array('code' => 5, 'msg' => 'Modification avec succès'));
    } else {
        return new JsonResponse(array('code' => 6, 'msg' => 'Cette clé n\'existe déjà'));
    }

})->bind('api_favoris_update');



$favori->post('/{id}/delet', function (Application $app, $id) {
    $favori = $app['favoris_manager']->FindByID($id);
    if ($favori->id != null) {
        $app['favoris_manager']->Delet($favori);
        return new JsonResponse(array('code' => 80, 'msg' => 'Supprimer avec succès'));

    } else {
        return new JsonResponse(array('code' => 81, 'msg' => 'Cette clé \'existe déjà'));
    }

}) ->bind('api_favori_delet');

return $favori;