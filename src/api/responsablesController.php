<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Entity\responsables;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

$responsable = $app['controllers_factory'];


$responsable->get('/', function (Application $app) {
    $responsables = $app['responsables_manager']->FetchAll();
    return new JsonResponse(array('code' => 1, 'msg' => $responsables));
})->bind('api_responsables') ;

$responsable->get('/{idresponsable}', function (Application $app, $idresponsable) {
    $responsable = $app['responsables_manager']->FindByID($idresponsable);
    return new JsonResponse(array('code' => 2, 'msg' => $responsable));
})->bind('responsable');



$responsable->post('/', function (Application $app, Request $request) {
    $id = $request->request->get('id');
    $email_resp = $request->request->get('email_resp');
    $Nom_resp = $request->request->get('Nom_resp');
    $Prenom_resp = $request->request->get('Prenom_resp');
    $tel_resp = $request->request->get('tel_resp');
    $Paiement_resp = $request->request->get('Paiement_resp');
    $NomUtilisateur_resp = $request->request->get('NomUtilisateur_resp');
    $mdp_resp = $request->request->get('mdp_resp');
    $id_ad = $request->request->get('id_ad');
    $id_Park = $request->request->get('id_Park');
    $responsable = new responsables($id,$email_resp,$Nom_resp,$Prenom_resp,$tel_resp,$Paiement_resp,$NomUtilisateur_resp, $mdp_resp, $id_ad, $id_Park);
    if ($app['responsables_manager']->KeyPrimary($responsable->id) == 0) {
        $app['responsables_manager']->add($responsable);
        return new JsonResponse(array('code' => 50, 'msg' => 'ajouter avec succès'));
    } else {
        return new JsonResponse(array('code' => 51, 'msg' => 'Cette clé existe déjà'));
    }
})->bind('api_responsable_new');

$responsable->post('/{id}/m', function (Application $app, Request $request, $id) {
    $responsable = $app['responsables_manager']->FindByID($id);
    if ($responsable->id != null) {
        $id = $request->request->get('id');
        $email_resp = $request->request->get('email_resp');
        $Nom_resp = $request->request->get('Nom_resp');
        $Prenom_resp = $request->request->get('Prenom_resp');
        $tel_resp = $request->request->get('tel_resp');
        $Paiement_resp = $request->request->get('Paiement_resp');
        $NomUtilisateur_resp = $request->request->get('NomUtilisateur_resp');
        $mdp_resp = $request->request->get('mdp_resp');
        $id_ad = $request->request->get('id_ad');
        $id_Park = $request->request->get('id_Park');
        $responsable = new responsables($id,$email_resp,$Nom_resp,$Prenom_resp,$tel_resp,$Paiement_resp,$NomUtilisateur_resp, $mdp_resp, $id_ad, $id_Park);
        $app['responsables_manager']->update($responsable);
        return new JsonResponse(array('code' => 5, 'msg' => 'Modification avec succès'));
    } else {
        return new JsonResponse(array('code' => 6, 'msg' => 'Cette clé n\'existe déjà'));
    }

})->bind('api_responsable_update');


$responsable->post('/{id}/delet', function (Application $app, $id) {
    $responsable = $app['responsables_manager']->FindByID($id);
    if ($responsable->id != null) {
        $app['responsables_manager']->Delet($responsable);
        return new JsonResponse(array('code' => 80, 'msg' => 'Supprimer avec succès'));

    } else {
        return new JsonResponse(array('code' => 81, 'msg' => 'Cette clé \'existe déjà'));
    }

}) ->bind('api_responsable_delet');

return $responsable;