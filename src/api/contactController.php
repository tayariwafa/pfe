<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Entity\contact;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

$contact = $app['controllers_factory'];


$contact->get('/', function (Application $app) {
    $contacts = $app['contact_manager']->FetchAll();
    return new JsonResponse(array('code' => 1, 'msg' => $contacts));
})->bind('api_contacts') ;

$contact->get('/{idcontact}', function (Application $app, $idcontact) {
    $contact = $app['contact_manager']->FindByID($idcontact);
    return new JsonResponse(array('code' => 2, 'msg' => $contact));
})->bind('api_contact');


$contact->post('/', function (Application $app, Request $request) {
    $id = $request->request->get('id');
    $police = $request->request->get('police');
    $ambulance = $request->request->get('ambulance');
    $protectionCivile = $request->request->get('protectionCivile');
    $contact = new contact($id,$police, $ambulance, $protectionCivile);
    $app['contact_manager']->update($contact);
    if ($app['contact_manager']->KeyPrimary($contact->id) == 0) {
        $app['contact_manager']->add($contact);
        return new JsonResponse(array('code' => 50, 'msg' => 'ajouter avec succès'));
    } else {
        return new JsonResponse(array('code' => 51, 'msg' => 'Cette clé existe déjà'));
    }
})->bind('api_contact_new');

$contact->post('/{id}/m', function (Application $app, Request $request, $id) {
    $contact = $app['contact_manager']->FindByID($id);
    if ($contact->id != null) {
        $id = $request->request->get('id');
        $police = $request->request->get('police');
        $ambulance = $request->request->get('ambulance');
        $protectionCivile = $request->request->get('protectionCivile');
        $contact = new contact($id,$police, $ambulance, $protectionCivile);
        $app['contact_manager']->update($contact);
        return new JsonResponse(array('code' => 5, 'msg' => 'Modification avec succès'));
    } else {
        return new JsonResponse(array('code' => 6, 'msg' => 'Cette clé n\'existe déjà'));
    }

})->bind('api_contact_update');



$contact->post('/{id}/delet', function (Application $app, $id) {
    $contact = $app['contact_manager']->FindByID($id);
    if ($contact->id != null) {
        $app['contact_manager']->Delet($contact);
        return new JsonResponse(array('code' => 80, 'msg' => 'Supprimer avec succès'));

    } else {
        return new JsonResponse(array('code' => 81, 'msg' => 'Cette clé \'existe déjà'));
    }

}) ->bind('api_contact_delet');

return $contact;