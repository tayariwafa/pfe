<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Entity\voitures;

use Symfony\Component\Security\Core\Exception\voiturenameNotFoundException;

$voiture = $app['controllers_factory'];


$voiture->get('/', function (Application $app) {
    $voitures = $app['voitures_manager']->FetchAll();
    return new JsonResponse(array('code' => 1, 'msg' => $voitures));
})->bind('api_voitures') ;


$voiture->get('/{idvoiture}', function (Application $app, $idvoiture) {
    $voiture = $app['voitures_manager']->FindByID($idvoiture);
    return new JsonResponse(array('code' => 2, 'msg' => $voiture));
})->bind('api_voiture');

$voiture->post('/', function (Application $app, Request $request) {
    $id = $request->request->get('id');
    $Matricule = $request->request->get('Matricule');
    $Marque = $request->request->get('Marque');
    $couleur = $request->request->get('couleur');
    $Id_ut = $request->request->get('Id_ut');
    $voiture = new voitures($id,$Matricule, $Marque, $couleur, $Id_ut);
    if ($app['voitures_manager']->KeyPrimary($voiture->id) == 0) {
        $app['voitures_manager']->add($voiture);
        return new JsonResponse(array('code' => 50, 'msg' => 'ajouter avec succès'));
    } else {
        return new JsonResponse(array('code' => 51, 'msg' => 'Cette clé existe déjà'));
    }
})->bind('api_voiture_new');

$voiture->post('/{id}/m', function (Application $app, Request $request, $id) {
    $voiture = $app['voitures_manager']->FindByID($id);
    if ($voiture->id != null) {
        $id = $request->request->get('id');
        $Matricule = $request->request->get('Matricule');
        $Marque = $request->request->get('Marque');
        $couleur = $request->request->get('couleur');
        $Id_ut = $request->request->get('Id_ut');
        $voitureup = new voitures($id,$Matricule, $Marque, $couleur, $Id_ut);
        $app['voitures_manager']->update($voitureup);
        return new JsonResponse(array('code' => 5, 'msg' => 'Modification avec succès'));
    } else {
        return new JsonResponse(array('code' => 6, 'msg' => 'Cette clé n\'existe déjà'));
    }

})->bind('api_voiture_update');

$voiture->post('/{id}/delet', function (Application $app, $id) {
    $voiture = $app['voitures_manager']->FindByID($id);
    if ($voiture->id != null) {
        $app['voitures_manager']->Delet($voiture);
        return new JsonResponse(array('code' => 80, 'msg' => 'Supprimer avec succès'));

    } else {
        return new JsonResponse(array('code' => 81, 'msg' => 'Cette clé \'existe déjà'));
    }

}) ->bind('api_voiture_delet');


return $voiture;

$voiture->get('/{id}/P/', function (Application $app , $id) {
    $voitures = $app['voitures_manager']->FetchAll();
    return new JsonResponse(array('code' => 55, 'msg' => ' Profile detecter'));
})->bind('api_voitures_GetProfile') ;
