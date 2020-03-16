<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Entity\Utilisateurs;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

$user = $app['controllers_factory'];


$user->get('/', function (Application $app) {
    $utilisateurs = $app['user_manager']->FetchAll();
    return new JsonResponse(array('code' => 1, 'msg' => $utilisateurs));
})->bind('api_users') ;


$user->get('/{username}', function (Application $app, $username) {
    $utilisateur = $app['user_manager']->FindByID($username);
    return new JsonResponse(array('code' => 2, 'msg' => $utilisateur));
})->bind('api_user');


$user->post('/', function (Application $app, Request $request) {

    $id = $request->request->get('id');
    $Prenom_ut = $request->request->get('Prenom_ut');
    $Nom_ut = $request->request->get('Nom_ut');
    $NomUtilisateur_ut = $request->request->get('NomUtilisateur_ut');
    $Email_ut = $request->request->get('Email_ut');
    $mdp_ut = $request->request->get('mdp_ut');
    $tel_ut = $request->request->get('tel_ut');
    $Solde_ut = $request->request->get('Solde_ut');
    $user = new Utilisateurs($id,$Prenom_ut, $Nom_ut, $NomUtilisateur_ut, $Email_ut, $mdp_ut, $tel_ut, $Solde_ut);

    if ($app['user_manager']->KeyPrimary($user->id) == 0) {
        $app['user_manager']->add($user);
        return new JsonResponse(array('code' => 50, 'msg' => 'ajouter avec succès'));
    } else {
        return new JsonResponse(array('code' => 51, 'msg' => 'Cette clé existe déjà'));
    }
})->bind('api_user_new');

$user->post('/{id}/m', function (Application $app, Request $request, $id) {
    $utilisateur = $app['user_manager']->FindByID($id);

    if ($utilisateur->id != null) {
        $id = $request->request->get('id');
        $Prenom_ut = $request->request->get('Prenom_ut');
        $Nom_ut = $request->request->get('Nom_ut');
        $NomUtilisateur_ut = $request->request->get('NomUtilisateur_ut');
        $Email_ut = $request->request->get('Email_ut');
        $mdp_ut = $request->request->get('mdp_ut');
        $tel_ut = $request->request->get('tel_ut');
        $Solde_ut = $request->request->get('Solde_ut');
        $user = new Utilisateurs($id,$Prenom_ut, $Nom_ut, $NomUtilisateur_ut, $Email_ut, $mdp_ut, $tel_ut, $Solde_ut);
        $app['user_manager']->update($user);
        return new JsonResponse(array('code' => 5, 'msg' => 'Modification avec succès'));
    } else {
        return new JsonResponse(array('code' => 6, 'msg' => 'Cette clé n\'existe déjà'));
    }

})->bind('api_user_update');

$user->post('/{id}/delet', function (Application $app, $id) {
    $user = $app['user_manager']->FindByID($id);
    if ($user->id != null) {
        $app['user_manager']->Delet($user);
        return new JsonResponse(array('code' => 80, 'msg' => 'Supprimer avec succès'));

    } else {
        return new JsonResponse(array('code' => 81, 'msg' => 'Cette clé \'existe déjà'));
    }

}) ->bind('api_voiture_delet');

$user->post('/login', function (Application $app, Request $request) {
    $username = $request->request->get('username');
    $password = $request->request->get('password');
    try {
        if (empty($username) || empty($password)) {
            throw new UsernameNotFoundException();
        }
        $count = $app['user_manager']->Authenticate($username, $password);

        if ($count == 0) {
            throw new UsernameNotFoundException();
        } else {
            $response = [
                'success' => true,
                'code' => 0,
                'token' => $app['security.jwt.encoder']->encode(['name' => $username]),
            ];
        }

    } catch (UsernameNotFoundException $e) {
        $response = [
            'success' => false,
            'code' => 99,
            'error' => 'les informations d\'identification invalides',
        ];
    }
    return new JsonResponse($response);

})
    ->bind('api_user_login');


return $user;