<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Entity\parkings;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

$parking = $app['controllers_factory'];


$parking->get('/', function (Application $app) {
    $parkings = $app['parkings_manager']->FetchAll();
    return new JsonResponse(array('code' => 1, 'msg' => $parkings));
})->bind('api_parkings') ;

$parking->get('/{idparking}', function (Application $app, $idparking) {
    $parking = $app['parkings_manager']->FindByID($idparking);
    return new JsonResponse(array('code' => 2, 'msg' => $parking));
})->bind('api_parking');


$parking->post('/', function (Application $app, Request $request) {
    $id = $request->request->get('id');
    $capacite_p = $request->request->get('capacite_p');
    $NbEtoil_p = $request->request->get('NbEtoil_p');
    $Nom_p = $request->request->get('Nom_p');
    $Rue_p = $request->request->get('Rue_p');
    $Ville_p = $request->request->get('Ville_p');
    $Pays_p = $request->request->get('Pays_p');
    $CodePostale_p = $request->request->get('CodePostale_p');
    $Longitude_p = $request->request->get('Longitude_p');
    $Laltitude_p = $request->request->get('Laltitude_p');
    $parking = new parkings($id,$capacite_p,$NbEtoil_p,$Nom_p,$Rue_p,$Ville_p,$Pays_p, $CodePostale_p, $Longitude_p, $Laltitude_p);
    if ($app['parkings_manager']->KeyPrimary($parking->id) == 0) {
        $app['parkings_manager']->add($parking);
        return new JsonResponse(array('code' => 50, 'msg' => 'ajouter avec succès'));
    } else {
        return new JsonResponse(array('code' => 51, 'msg' => 'Cette clé existe déjà'));
    }
})->bind('api_parking_new');

$parking->post('/{id}/m', function (Application $app, Request $request, $id) {
    $parking = $app['parkings_manager']->FindByID($id);
    if ($parking->id != null) {
        $id = $request->request->get('id');
        $capacite_p = $request->request->get('capacite_p');
        $NbEtoil_p = $request->request->get('NbEtoil_p');
        $Nom_p = $request->request->get('Nom_p');
        $Rue_p = $request->request->get('Rue_p');
        $Ville_p = $request->request->get('Ville_p');
        $Pays_p = $request->request->get('Pays_p');
        $CodePostale_p = $request->request->get('CodePostale_p');
        $Longitude_p = $request->request->get('Longitude_p');
        $Laltitude_p = $request->request->get('Laltitude_p');
        $parking = new parkings($id,$capacite_p,$NbEtoil_p,$Nom_p,$Rue_p,$Ville_p,$Pays_p, $CodePostale_p, $Longitude_p, $Laltitude_p);
        $app['parkings_manager']->update($parking);
        return new JsonResponse(array('code' => 5, 'msg' => 'Modification avec succès'));
    } else {
        return new JsonResponse(array('code' => 6, 'msg' => 'Cette clé n\'existe déjà'));
    }

})->bind('api_parking_update');




$parking->post('/{id}/delet', function (Application $app, $id) {
    $parking = $app['parkings_manager']->FindByID($id);
    if ($parking->id != null) {
        $app['parkings_manager']->Delet($parking);
        return new JsonResponse(array('code' => 80, 'msg' => 'Supprimer avec succès'));

    } else {
        return new JsonResponse(array('code' => 81, 'msg' => 'Cette clé \'existe déjà'));
    }

}) ->bind('api_parking_delet');

return $parking;