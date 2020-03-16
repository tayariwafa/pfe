<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Entity\administrations;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

$administration = $app['controllers_factory'];


$administration->get('/', function (Application $app) {
    $administrations = $app['administrations_manager']->FetchAll();
    return new JsonResponse(array('code' => 1, 'msg' => $administrations));
})->bind('api_administrations') ;

$administration->get('/{idadministration}', function (Application $app, $idadministration) {
    $administration = $app['administrations_manager']->FindByID($idadministration);
    return new JsonResponse(array('code' => 2, 'msg' => $administration));
})->bind('api_administration');


$administration->post('/', function (Application $app, Request $request) {
    $id = $request->request->get('id');
    $email_ad = $request->request->get('email_ad');
    $Num_tel = $request->request->get('Num_tel');
    $Prenom_ad = $request->request->get('Prenom_ad');
    $Nom_ad = $request->request->get('Nom_ad');
    $NomUtilisateur_ad = $request->request->get('NomUtilisateur_ad');
    $mdp_ad = $request->request->get('mdp_ad');
    $administration = new administrations($id,$email_ad, $Num_tel, $Prenom_ad, $Nom_ad,$NomUtilisateur_ad,$mdp_ad);
    if ($app['administrations_manager']->KeyPrimary($administration->id) == 0) {
        $app['administrations_manager']->add($administration);
        return new JsonResponse(array('code' => 50, 'msg' => 'ajouter avec succès'));
    } else {
        return new JsonResponse(array('code' => 51, 'msg' => 'Cette clé existe déjà'));
    }
})->bind('api_administration_new');

$administration->post('/{id}/m', function (Application $app, Request $request, $id) {
    $administration = $app['administrations_manager']->FindByID($id);
    if ($administration->id != null) {
        $id = $request->request->get('id');
        $email_ad = $request->request->get('email_ad');
        $Num_tel = $request->request->get('Num_tel');
        $Prenom_ad = $request->request->get('Prenom_ad');
        $Nom_ad = $request->request->get('Nom_ad');
        $NomUtilisateur_ad = $request->request->get('NomUtilisateur_ad');
        $mdp_ad = $request->request->get('mdp_ad');
        $administration = new administrations($id,$email_ad, $Num_tel, $Prenom_ad, $Nom_ad,$NomUtilisateur_ad,$mdp_ad);
        $app['administrations_manager']->update($administration);
        return new JsonResponse(array('code' => 5, 'msg' => 'Modification avec succès'));
    } else {
        return new JsonResponse(array('code' => 6, 'msg' => 'Cette clé n\'existe déjà'));
    }

})->bind('api_administration_update');



$administration->post('/{id}/delet', function (Application $app, $id) {
    $administration = $app['administrations_manager']->FindByID($id);
    if ($administration->id != null) {
           $app['administrations_manager']->Delet($administration);
            return new JsonResponse(array('code' => 80, 'msg' => 'Supprimer avec succès'));

    } else {
        return new JsonResponse(array('code' => 81, 'msg' => 'Cette clé \'existe déjà'));
    }

}) ->bind('api_administration_delet');

return $administration;