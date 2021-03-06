<?php
header('Access-Control-Allow-Origin: *');
use custumbox\models\produit;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';


error_reporting(E_ALL ^ E_DEPRECATED);

\custumbox\database\Eloquent::start(__DIR__ . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "conf" . DIRECTORY_SEPARATOR . "conf.ini");

$container = new Slim\Container(['settings' => ['displayErrorDetails' => true]]);
$app = new Slim\App($container);
$app->get('/',
    function (Request $rq, Response $rs, $args): Response {
        return $rs->write("aled");

    });



$app->get('/recupererProduits',
    function (Request $rq, Response $rs, $args): Response {
        $prods = produit::all();

        $vueProd = new \custumbox\vues\VueProduit($prods->toArray());
        $rs->getBody()->write($vueProd->render(1));
        return $rs;

    });

$app->get('/afficherPanier', function (Request $rq, Response $rs, $args): Response {

    $vueBoite = new \custumbox\vues\VueBoite([]);
    $rs->getBody()->write($vueBoite->render(1));
    return $rs;
    });

try {
    $app->run();
} catch (Throwable $e) {
    echo $e->getMessage();
}