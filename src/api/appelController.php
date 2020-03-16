<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Entity\appel;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

$call = $app['controllers_factory'];


$call->get('/', function (Application $app) {
    $call = $app['appel_manager']->FetchAll();
    return new JsonResponse(array('code' => 69, 'msg' => $call));
})->bind('api_appels') ;

$call->get('/{idappel}', function (Application $app, $call) {
    $call = $app['appel_manager']->FindByID($call);
    return new JsonResponse(array('code' => 2, 'msg' => $call));
})->bind('api_appel');


$call->post('/', function (Application $app, Request $request) {
    $id = $request->request->get('id');
    $Nom_C = $request->request->get('Nom_C');
    $Num_C = $request->request->get('Num_C');
   
    $call = new appel($id,$Nom_C, $Num_C);
    if ($app['appel_manager']->KeyPrimary($call->id) == 0) {
        $app['appel_manager']->add($call);
        return new JsonResponse(array('code' => 96, 'msg' => 'ajouter avec succès'));
    } else {
        return new JsonResponse(array('code' => 67, 'msg' => 'Cette clé existe déjà'));
    }
})->bind('api_appel');

$call->post('/{id}/m', function (Application $app, Request $request, $id) {
    $call = $app['appel_manager']->FindByID($id);
    if ($call->id != null) {
        $id = $request->request->get('id');
        $Nom_C = $request->request->get('Nom_C');
        $Num_C = $request->request->get('Num_C');
      
        $call = new appel($id,$Nom_C, $Num_C);
        $app['appel_manager']->update($call);
        return new JsonResponse(array('code' => 5, 'msg' => 'Modification avec succès'));
    } else {
        return new JsonResponse(array('code' => 6, 'msg' => 'Cette clé n\'existe déjà'));
    }

})->bind('api_appel_update');



$call->post('/{id}/delet', function (Application $app, $id) {
    $call = $app['appel_manager']->FindByID($id);
    if ($call->id != null) {
           $app['appel_manager']->Delet($call);
            return new JsonResponse(array('code' => 80, 'msg' => 'Supprimer avec succès'));

    } else {
        return new JsonResponse(array('code' => 81, 'msg' => 'Cette clé \'existe déjà'));
    }

}) ->bind('api_appel_delet');

return $call;