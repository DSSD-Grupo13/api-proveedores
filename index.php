<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

require_once './private/autoloader.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;
$container = $app->getContainer();
$container['errorHandler'] = function ($container) {
  return new \ErrorHandler;
};

$app->get("/", function (Request $request, Response $response)
 {
  return $response->withStatus(200)->withHeader('Content-Type', 'text/html')->getBody()->write(file_get_contents('index.html'));
});

$app->post("/solicitar-presupuesto", function (Request $request, Response $response, $args) {
    $objetos = $request->getParsedBodyParam('objetos', []);
    $presupuesto = crearPresupuestoJSON($objetos);
    return $response->withJson($presupuesto, 200, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
});

$app->run();