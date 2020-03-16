<?php
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use JDesrosiers\Silex\Provider\CorsServiceProvider;

$app = new Silex\Application();

$app->before(function (Request $request, Application $app) {
 /*   $responseToken = [
        'success' => false,
        'code' => 0,
        'error' => 'les informations d\'identification invalides',
    ];
    $responsePermission = [
        'success' => false,
        'code' => 500,
        'error' => 'vous n\'avez pas cette autorisation',
    ];
    $right = $request->attributes->get('_route');
    // test athentification
    if ($right != "api_user_login" && $right != "api_users") {
        $token = $request->query->get('token');
        if (empty($token)) {
            return new JsonResponse($responseToken);
        }
        try {
            $jwt = $app['security.jwt.encoder']->decode($token);
            // test droit
            $app['username'] = $jwt->name;
//            $countHasRoleProjet = $app['user_manager']->HasRoleProjet($app['username'], $right);
//            if ($countHasRoleProjet == 0)
//                return new JsonResponse($responsePermission);
        } catch (UnexpectedValueException  $e) {
            return new JsonResponse($responseToken);
        }
    }
*/
});


$app->after(function (Request $request, Response $response) {
    $response->headers->set('Access-Control-Allow-Origin', '*');
    $response->headers->set('Access-Control-Allow-Headers', 'X-CSRF-Token, X-Requested-With, Accept, Accept-Version, Content-Length, Content-MD5, Content-Type, Date, X-Api-Version, Origin');
    $response->headers->set('Access-Control-Allow-Methods', 'GET, PUT, POST, DELETE, OPTIONS');
});

return $app;
