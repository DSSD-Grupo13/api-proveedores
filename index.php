<?php
require './private/autoloader.php';

$app = new \Slim\Slim();

$app->get('/', function () use ($app) {
  $res = $app->response;
  $res->setStatus(200);
  $res->setBody("<html><body><h1>Slim API</h1></body></html>");
  $res->headers->set('Content-Type', 'text/html');
  $res->finalize();
});


$app->get('/people', function () use ($app) {
  $res = $app->response;
  $res->setStatus(200);
  $res->setBody(json_encode('hola mundo'));
  $res->headers->set('Content-Type', 'application/json');
  $res->finalize();
});

$app->run();