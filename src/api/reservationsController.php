<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Entity\reservations;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

$reservation = $app['controllers_factory'];

$reservation->get('/{Matricule}/r/', function (Application $app,$Matricule) {
     try {
        if (empty($Matricule)) {
            return new JsonResponse(array('code' => 400, 'msg' => 'vous devez inserer une matricule'));
        }
        $count = $app['reservations_manager']->Rechercher($Matricule);

        if ($count == 0) {
            return new JsonResponse(array('code' => 401, 'msg' => 'false'));
        } else {
            return new JsonResponse(array('code' => 402, 'msg' => 'true'));
        }

    } catch (UsernameNotFoundException $e) {
        $response = [
            'success' => false,
            'code' => 403,
            'error' => 'Probléme de connection',
        ];
    }
    return new JsonResponse($response);

}) ->bind('api_reservation_rech');

$reservation->get('/', function (Application $app) {
    $reservations = $app['reservations_manager']->FetchAll();
    return new JsonResponse(array('code' => 1, 'msg' => $reservations));
})->bind('api_reservations') ;

$reservation->get('/{idreservation}', function (Application $app, $idreservation) {
    $reservation = $app['reservations_manager']->FindByID($idreservation);
    return new JsonResponse(array('code' => 2, 'msg' => $reservation));
})->bind('api_reservation');

$reservation->post('/', function (Application $app, Request $request) {
    $id = $request->request->get('id');
    $ModePaiement = $request->request->get('ModePaiement');
    $Montant_carte = $request->request->get('Montant_carte');
    $Montant_espece = $request->request->get('Montant_espece');
    $MontantPay = $request->request->get('MontantPay');
    $Surplus = $request->request->get('Surplus');
    $DateDeb = $request->request->get('DateDeb');
    $DateFin = $request->request->get('DateFin');
    $HeurDeb = $request->request->get('HeurDeb');
    $HeurFin = $request->request->get('HeurFin');
    $Id_Gard = $request->request->get('Id_Gard');
    $Id_ut = $request->request->get('Id_ut');
    $Id_voiture = $request->request->get('Id_voiture');
    $Id_place = $request->request->get('Id_place');
    $reservation = new reservations($id,$ModePaiement,$Montant_carte,$Montant_espece,$MontantPay,$Surplus,$DateDeb, $DateFin, $HeurDeb,$HeurFin,$Id_Gard,$Id_ut,$Id_voiture,$Id_place);
    if ($app['reservation_manager']->KeyPrimary($reservation->id) == 0) {
        $app['reservation_manager']->add($reservation);
        return new JsonResponse(array('code' => 50, 'msg' => 'ajouter avec succès'));
    } else {
        return new JsonResponse(array('code' => 51, 'msg' => 'Cette clé existe déjà'));
    }
})->bind('api_reservation_new');

$reservation->post('/{id}/m', function (Application $app, Request $request, $id) {
    $reservation = $app['reservation_manager']->FindByID($id);
    if ($reservation->id != null) {
        $id = $request->request->get('id');
        $ModePaiement = $request->request->get('ModePaiement');
        $Montant_carte = $request->request->get('Montant_carte');
        $Montant_espece = $request->request->get('Montant_espece');
        $MontantPay = $request->request->get('MontantPay');
        $Surplus = $request->request->get('Surplus');
        $DateDeb = $request->request->get('DateDeb');
        $DateFin = $request->request->get('DateFin');
        $HeurDeb = $request->request->get('HeurDeb');
        $HeurFin = $request->request->get('HeurFin');
        $Id_Gard = $request->request->get('Id_Gard');
        $Id_ut = $request->request->get('Id_ut');
        $Id_voiture = $request->request->get('Id_voiture');
        $Id_place = $request->request->get('Id_place');
        $reservation = new reservations($id,$ModePaiement,$Montant_carte,$Montant_espece,$MontantPay,$Surplus,$DateDeb, $DateFin, $HeurDeb,$HeurFin,$Id_Gard,$Id_ut,$Id_voiture,$Id_place);
        $app['reservation_manager']->update($reservation);
        return new JsonResponse(array('code' => 5, 'msg' => 'Modification avec succès'));
    } else {
        return new JsonResponse(array('code' => 6, 'msg' => 'Cette clé n\'existe déjà'));
    }

})->bind('api_reservation_update');


$reservation->post('/{id}/delet', function (Application $app, $id) {
    $reservation = $app['places_manager']->FindByID($id);
    if ($reservation->id != null) {
        $app['places_manager']->Delet($reservation);
        return new JsonResponse(array('code' => 80, 'msg' => 'Supprimer avec succès'));

    } else {
        return new JsonResponse(array('code' => 81, 'msg' => 'Cette clé \'existe déjà'));
    }

}) ->bind('api_reservation_delet');


return $reservation;