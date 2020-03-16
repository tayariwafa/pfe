<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Entity\gardiens;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

$gardien = $app['controllers_factory'];


$gardien->get('/', function (Application $app) {
    $gardiens = $app['gardiens_manager']->FetchAll();
    return new JsonResponse(array('code' => 1, 'msg' => $gardiens));
})->bind('api_gardiens') ;

$gardien->get('/{idgardien}', function (Application $app, $idgardien) {
    $gardien = $app['gardiens_manager']->FindByID($idgardien);
    return new JsonResponse(array('code' => 2, 'msg' => $gardien));
})->bind('api_gardien');


$gardien->post('/', function (Application $app, Request $request) {
    $id = $request->request->get('id');
    $email_g = $request->request->get('email_g');
    $Prenom_g = $request->request->get('Prenom_g');
    $cin_g = $request->request->get('cin_g');
    $tel_g = $request->request->get('tel_g');
    $Nom_g = $request->request->get('Nom_g');
    $salaire_g = $request->request->get('salaire_g');
    $NbHeure_g = $request->request->get('NbHeure_g');
    $TempsHoraire_g = $request->request->get('TempsHoraire_g');
    $NomUtilisateur_g = $request->request->get('NomUtilisateur_g');
    $mdp_g = $request->request->get('mdp_g');
    $Id_park = $request->request->get('Id_park');
    $gardien = new gardiens($id,$email_g,$Prenom_g,$cin_g,$tel_g,$Nom_g,$salaire_g,$NbHeure_g,$TempsHoraire_g, $NomUtilisateur_g,$mdp_g, $Id_park);
    if ($app['gardiens_manager']->KeyPrimary($gardien->id) == 0) {
        $app['gardiens_manager']->add($gardien);
        return new JsonResponse(array('code' => 50, 'msg' => 'ajouter avec succès'));
    } else {
        return new JsonResponse(array('code' => 51, 'msg' => 'Cette clé existe déjà'));
    }
})->bind('api_gardien_new');

$gardien->post('/{id}/m', function (Application $app, Request $request, $id) {
    $gardien = $app['gardiens_manager']->FindByID($id);
    if ($gardien->id != null) {
        $id = $request->request->get('id');
        $email_g = $request->request->get('email_g');
        $Prenom_g = $request->request->get('Prenom_g');
        $cin_g = $request->request->get('cin_g');
        $tel_g = $request->request->get('tel_g');
        $Nom_g = $request->request->get('Nom_g');
        $salaire_g = $request->request->get('salaire_g');
        $NbHeure_g = $request->request->get('NbHeure_g');
        $TempsHoraire_g = $request->request->get('TempsHoraire_g');
        $NomUtilisateur_g = $request->request->get('NomUtilisateur_g');
        $mdp_g = $request->request->get('mdp_g');
        $Id_park = $request->request->get('Id_park');
        $gardien = new gardiens($id,$email_g,$Prenom_g,$cin_g,$tel_g,$Nom_g,$salaire_g,$NbHeure_g,$TempsHoraire_g, $NomUtilisateur_g,$mdp_g, $Id_park);
        $app['gardiens_manager']->update($gardien);
        return new JsonResponse(array('code' => 5, 'msg' => 'Modification avec succès'));
    } else {
        return new JsonResponse(array('code' => 6, 'msg' => 'Cette clé n\'existe déjà'));
    }

})->bind('api_gardien_update');



$gardien->post('/{id}/delet', function (Application $app, $id) {
    $gardien = $app['gardiens_manager']->FindByID($id);
    if ($gardien->id != null) {
        $app['gardiens_manager']->Delet($gardien);
        return new JsonResponse(array('code' => 80, 'msg' => 'Supprimer avec succès'));

    } else {
        return new JsonResponse(array('code' => 81, 'msg' => 'Cette clé \'existe déjà'));
    }

}) ->bind('api_gardien_delet');

return $gardien;